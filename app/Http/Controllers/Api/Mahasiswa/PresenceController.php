<?php

namespace App\Http\Controllers\Api\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Presence;

class PresenceController extends Controller
{
    public function scan(Request $request) {
        $request->validate([
            'code' => 'required'
        ]);

        $presence = Presence::whereHas('scheduleSession', function ($q) {
            $q->whereHas('schedule', function ($q2) {
                $q2->whereHas('mahasiswas', function ($q3) {
                    $q3->where('user_id', Auth::user()->id);
                });
            });
        })->where('qr_code', $request->code)->first();

        if (empty($presence)) 
            return composeReply(false, 'Data presensi tidak ditemukan', []);

        $presence->presenceAttendances()->create([
            'mahasiswa_id' => Auth::user()->mahasiswa->id,
            'qr_scanned' => $request->code,
            'clock_in' => date('H:i:s')
        ]);

        return composeReply(true, 'Success', [
            'presence' => $presence->refresh()
        ]);
    }
}
