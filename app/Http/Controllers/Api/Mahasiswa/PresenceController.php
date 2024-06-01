<?php

namespace App\Http\Controllers\Api\Mahasiswa;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Constants\UserType;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);

        $presence = Presence::whereHas('scheduleSession', function ($q) {
            $q->whereHas('schedule', function ($q2) {
                $q2->whereHas('mahasiswas', function ($q3) {
                    $q3->where('user_id', Auth::user()->id);
                });
            });
        })
            ->where('qr_code', $request->code)
            ->first();

        if (empty($presence)) {
            return composeReply(false, 'Data presensi tidak ditemukan', []);
        }

        $presence->presenceAttendances()->create([
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
            'qr_scanned' => $request->code,
            'clock_in' => date('H:i:s'),
        ]);

        return composeReply(true, 'Success', [
            'presence' => $presence->refresh(),
        ]);
    }

    public function storeAbsence(Request $request)
    {
        $request->validate([
            'presence_id' => 'required',
            'absence_type' => 'required|in:IZIN,SAKIT',
            'notes' => 'nullable',
            'absence_letter' => 'nullable',
        ]);

        $presence = Presence::whereHas('scheduleSession', function ($q) {
            $q->whereHas('schedule', function ($q2) {
                $q2->whereHas('mahasiswas', function ($q3) {
                    $q3->where('user_id', Auth::user()->id);
                });
            });
        })->findOrFail($request->presence_id);

        $insertData = [
            'presence_id' => $presence->id,
            'absence_type' => $request->absence_type,
            'notes' => $request->notes,
            'submitted_by' => UserType::MAHASISWA,
            'is_approved' => false,
        ];

        // upload file
        if ($request->hasFile('absence_letter')) {
            $fileName = Str::random(5) . now('YmdHis') . '.' . $request->file('absence_letter')->getClientOriginalExtension();
            $path = 'absence-letters/';

            Storage::put($path . $fileName, $request->file);

            $insertData['image'] = $fileName;
        }

        $absence = $presence->presenceAbsences()->create($insertData);

        return composeReply(true, 'Success', [
            'absence' => $absence,
        ]);
    }
}
