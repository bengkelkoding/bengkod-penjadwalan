<?php

namespace App\Http\Controllers\Admin;

use App\Constants\DayConstant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Schedule;
use App\Models\ScheduleSession;
use Illuminate\Http\Request;
use App\Models\AdminSetting;
use Carbon\Carbon;

class SettingController extends Controller
{
    public function index()
    {
        $settings = AdminSetting::orderBy('key')->get();

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->setting_values as $idx => $setting_value) {
                if ($request->setting_keys[$idx] == 'start_perkuliahan') {
                    $this->populatePresenceDate($setting_value);
                } 
                else if ($request->setting_keys[$idx] == 'jumlah_pertemuan') {
                    
                }

                AdminSetting::updateOrCreate(['key' => $request->setting_keys[$idx]], ['value' => $setting_value]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()
                ->back()
                ->withErrors(['setting_values' => 'Terjadi kesalahan internal']);
        }

        return redirect()->back()->with('success', 'Berhasil edit data');
    }

    private function populatePresenceDate($setting_value)
    {
        $startPerkuliahan = $setting_value;
        $existingStartPerkuliahan = AdminSetting::where('key', 'start_perkuliahan')->first();

        if ($startPerkuliahan != $existingStartPerkuliahan->value) {
            $startPerkuliahan = Carbon::parse($startPerkuliahan)->locale('id');
            $weekIndex = $startPerkuliahan->dayOfWeek;

            $sessions = ScheduleSession::has('presences')
                ->with([
                    'presences' => function ($q) {
                        $q->orderBy('week');
                    },
                ])
                ->get();

            foreach ($sessions as $session) {
                $existingWeekIndex = DayConstant::getId($session->day);

                $firstPresenceDate = $startPerkuliahan;

                if ($weekIndex > $existingWeekIndex) {
                    $dayInterval = 7 - ($weekIndex - $existingWeekIndex);
                    $firstPresenceDate->addDays($dayInterval);
                } else {
                    $firstPresenceDate->addDays($existingWeekIndex - $weekIndex);
                }

                foreach ($session->presences as $presence) {
                    if ($presence->week > 1) {
                        $firstPresenceDate->addDays(7 * ($presence->week - 1));
                    }

                    $dateUpdate = $firstPresenceDate;

                    $presence->update([
                        'presence_date' => $dateUpdate->format('Y-m-d'),
                    ]);
                }
            }
        }
    }
}
