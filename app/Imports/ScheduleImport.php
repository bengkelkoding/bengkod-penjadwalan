<?php

namespace App\Imports;

use App\Constants\DayConstant;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Schedule;
use App\Models\Classroom;
use Maatwebsite\Excel\Row;
use App\Constants\UserType;
use App\Models\ScheduleSession;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class ScheduleImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        // Dosen
        if (isset($row['nip_dosen']) && $row['nip_dosen'] !== "") {
            $user = User::where('code', $row['nip_dosen'])->where('type', UserType::DOSEN)->first();

            if (!isset($user)) {
                $user = User::create([
                    'code' => $row['nip_dosen'],
                    'fullname' => trim($row['nama_dosen']),
                    'type' => UserType::DOSEN,
                    'password' => Hash::make('12345678')
                ]);

                $user->dosen()->create([
                    'nip' => $row['nip_dosen']
                ]);
            }
        }

        // Schedule
        $schedule = Schedule::firstOrCreate([
            'kode_matkul' => $row['kdmk'],
            'nama_matkul' => $row['nama_matkul'],
            'kode_kelompok' => $row['klpk']
        ], [
            'dosen_id' => isset($user) ? $user->dosen->id : null,
            'sks' => $row['sks'],
            'kuota' => $row['kuota'],
            'jumlah_mahasiswa' => $row['jml_mhs']
        ]);

        for ($i = 1; $i <= 3; $i++) {
            $hari = trim($row['hari_' . $i]);
            $jam = trim($row['jam_' . $i]);
            $ruang = trim($row['ruang_' . $i]);

            if (
                ($hari !== "" && $hari !== "-")
                && ($jam !== "" && $jam !== "-")
                && ($ruang !== "" && $ruang !== "-")
            ) {
                $classroom = Classroom::firstOrCreate(['name' => $ruang]);

                $time = explode('-', $jam);

                $session = ScheduleSession::firstOrCreate([
                    'schedule_id' => $schedule->id,
                    'classroom_id' => $classroom->id,
                    'day' => $hari,
                    'time_start' => str_replace('.', ':', $time[0]) . ':00',
                    'time_end' => str_replace('.', ':', $time[1]) . ':00'
                ]);

                if (count($session->presences) == 0)
                    $this->createPresenceForSession($session);
            }
        }
    }

    private function createPresenceForSession($session)
    {
        $startPerkuliahan = Carbon::parse(getSettingValue('start_perkuliahan') ?? Carbon::now()->format('Y-m-d'));
        $jumlahPertemuan = getSettingValue('jumlah_pertemuan') ?? 14;

        // Cari index hari dari startPerkuliahan
        $startPerkuliahanDayOfWeek = $startPerkuliahan->dayOfWeek;
        $sessionDayOfWeek = DayConstant::getId($session->day);

        // Tentukan tanggal presensi pertama
        if ($startPerkuliahanDayOfWeek > $sessionDayOfWeek) {
            $dayInterval = 7 - ($startPerkuliahanDayOfWeek - $sessionDayOfWeek);
        } else {
            $dayInterval = $sessionDayOfWeek - $startPerkuliahanDayOfWeek;
        }

        $firstPresenceDate = $startPerkuliahan->copy()->addDays($dayInterval);

        $insertData = [];
        for ($i = 1; $i <= $jumlahPertemuan; $i++) {
            $insertData[] = [
                'week' => $i,
                'is_enabled' => true,
                'presence_date' => $firstPresenceDate->copy()->addDays(7 * ($i - 1))->format('Y-m-d')
            ];
        }

        $session->presences()->createMany($insertData);
    }
}
