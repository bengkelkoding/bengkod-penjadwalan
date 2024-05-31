<?php

namespace App\Http\Controllers\Api\Dosen;

use App\Constants\UserType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScheduleSession;
use Illuminate\Support\Facades\Auth;
use App\Transformers\PresenceDosenCollection;
use App\Transformers\ScheduleSessionCollection;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = ScheduleSession::whereHas('schedule', function ($q) {
            $q->whereHas('dosen', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });
        })
            ->with('classroom')
            ->orderBy('day')
            ->get();

        return composeReply(true, 'Success', ScheduleSessionCollection::collection($schedules));
    }

    public function show($id)
    {
        $schedule = ScheduleSession::whereHas('schedule', function ($q) {
            $q->whereHas('dosen', function ($q) {
                $q->where('user_id', Auth::user()->id);
            });
        })
            ->with('schedule.mahasiswas.user', 'classroom')
            ->findOrFail($id);

        $presences = $schedule
            ->presences()
            ->orderBy('week')
            ->get();

        return composeReply(true, 'Success', [
            'schedule' => new ScheduleSessionCollection($schedule),
            'students' => $schedule->schedule->mahasiswas,
            'presences' => PresenceDosenCollection::collection($presences)
        ]);
    }
}
