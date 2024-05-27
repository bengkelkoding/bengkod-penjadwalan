<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ScheduleSession;
use App\Models\AdminSetting;
use Carbon\Carbon;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminSetting::firstOrCreate(['key' => 'start_perkuliahan'], ['value' => Carbon::now()->format('Y-m-d')]);
        AdminSetting::firstOrCreate(['key' => 'jumlah_pertemuan'], ['value' => 14]);
        AdminSetting::firstOrCreate(['key' => 'absence_max_limit'], ['value' => 3]);

        // Presence WIP (include perhitungan tanggal)
        // $session = ScheduleSession::firstOrFail();
        // if (count($session->presences) == 0) {
        //     $startPerkuliahan = getSettingValue('start_perkuliahan') ?? Carbon::now()->format('Y-m-d');
        //     $jumlahPertemuan = getSettingValue('jumlah_pertemuan') ?? 14;

        //     $insertData = [];
        //     for ($i = 1; $i <= $jumlahPertemuan; $i++) {
        //         $value = [
        //             'week' => $i,
        //             'is_enabled' => true,
        //         ];

        //         if ($i == 1) {
        //             $value = array_merge($value, [
        //                 'qr_is_generated' => true,
        //                 'qr_code' => generateQrCode(),
        //                 'qr_generated_at' => now(),
        //             ]);
        //         }

        //         $insertData[] = $value;
        //     }

        //     $session->presences()->createMany($insertData);
        // }
    }
}
