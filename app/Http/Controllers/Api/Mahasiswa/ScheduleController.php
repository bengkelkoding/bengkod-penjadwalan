<?php

namespace App\Http\Controllers\Api\Mahasiswa;

use App\Constants\UserType;
use App\Transformers\ScheduleSessionCollection;
use App\Transformers\PresenceMhsCollection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ScheduleSession;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = ScheduleSession::whereHas('schedule', function ($q) {
            $q->whereHas('mahasiswas', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });
        })
            ->with('schedule.dosen.user', 'classroom')
            ->orderBy('day')
            ->get();

        return composeReply(true, 'Success', ScheduleSessionCollection::collection($schedules));
    }

    public function show($scheduleSessionId)
    {
        $schedule = ScheduleSession::whereHas('schedule', function ($q) {
            $q->whereHas('mahasiswas', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });
        })
            ->with('schedule.dosen.user', 'classroom')
            ->orderBy('day')
            ->findOrFail($scheduleSessionId);

        $allPresencesCount = $schedule->presences()->count();

        $attendedPresence = $schedule
            ->presences()
            ->whereHas('presenceAttendances', function ($q) {
                $q->where('mahasiswa_id', Auth::user()->mahasiswa->id);
            })
            ->count();

        $absenceWithReason = $schedule
            ->presences()
            ->where('is_enabled', true)
            ->where('qr_is_generated', true)
            ->whereHas('presenceAbsences', function ($q) {
                $q->where('mahasiswa_id', Auth::user()->mahasiswa->id)->where('is_approved', true);
            })
            ->count();

        $absenceNoReason = $schedule
            ->presences()
            ->where('is_enabled', true)
            ->where('qr_is_generated', true)
            ->whereDoesntHave('presenceAttendances', function ($q) {
                $q->where('mahasiswa_id', Auth::user()->mahasiswa->id);
            })
            ->count();

        $presences = $schedule
            ->presences()
            ->with(['presenceAttendances' => function ($q) {
                $q->where('mahasiswa_id', Auth::user()->mahasiswa->id);
            }])
            ->with(['presenceAbsences' => function ($q) {
                $q->where('mahasiswa_id', Auth::user()->mahasiswa->id);
            }])
            ->orderBy('week')
            ->get();

        return composeReply(true, 'Success', [
            'schedule' => new ScheduleSessionCollection($schedule),
            'all_presence_count' => $allPresencesCount,
            'attended_presence_count' => $attendedPresence,
            'absence_max_limit' => getSettingValue('absence_max_limit'),
            'absence_count' => $absenceNoReason + $absenceWithReason,
            'absence_with_reason_count' => $absenceWithReason,
            'absence_no_reason_count' => $absenceNoReason,
            'presences' => PresenceMhsCollection::collection($presences)
        ]);
    }
}
