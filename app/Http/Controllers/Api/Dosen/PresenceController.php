<?php

namespace App\Http\Controllers\Api\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use App\Constants\UserType;
use Illuminate\Http\Request;
use App\Transformers\PresenceDosenCollection;

class PresenceController extends Controller
{
    public function show($scheduleSessionId, $presenceId) {
        $presence = Presence::whereHas('scheduleSession', function ($q) use ($scheduleSessionId) {
            $q->where('id', $scheduleSessionId)->whereHas('schedule', function ($q2) {
                $q2->whereHas('dosen', function ($q3) {
                    $q3->where('user_id', Auth::user()->id);
                });
            });
        })
        ->with('scheduleSession.schedule.mahasiswas.user', 'presenceAttendances.mahasiswa.user', 'presenceAbsences.mahasiswa.user')
        ->findOrFail($presenceId);

        $approvedAbsences = [];
        $pendingAbsences = [];
        foreach ($presence->presenceAbsences as $abs) {
            if ($abs->is_approved) 
                $approvedAbsences[] = $abs;
            else 
                $pendingAbsences[] = $abs;
        }

        return composeReply(true, 'Success', [
            'presence' => new PresenceDosenCollection($presence),
            'students' => $presence->scheduleSession->schedule->mahasiswas,
            'attendances' => $presence->presenceAttendances,
            'approved_absences' => $approvedAbsences,
            'pending_absences' => $pendingAbsences
        ]);
    }

    public function generateQR($scheduleSessionId, $presenceId)
    {
        $presence = Presence::whereHas('scheduleSession', function ($q) use ($scheduleSessionId) {
            $q->where('id', $scheduleSessionId)->whereHas('schedule', function ($q2) {
                $q2->whereHas('dosen', function ($q3) {
                    $q3->where('user_id', Auth::user()->id);
                });
            });
        })->findOrFail($presenceId);

        $code = generateQrCode();

        $presence->update([
            'qr_is_generated' => true,
            'qr_code' => $code,
            'qr_generated_at' => now()
        ]);

        return composeReply(true, 'Success', [
            'presence_id' => $presence->id,
            'qr_code' => $code,
            'qr_generated_at' => $presence->refresh()->qr_generated_at
        ]); 
    }
}
