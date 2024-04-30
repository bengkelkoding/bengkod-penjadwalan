<?php

namespace App\Imports;

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

class ScheduleImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        // Dosen
        if (isset($row['nip_dosen']) && $row['nip_dosen'] !== "") {
            $user = User::where('code', $row['nip_dosen'])->where('type', UserType::DOSEN)->first();

            if (! isset($user)) {
                $user = User::create([
                    'code' => $row['nip_dosen'],
                    'fullname' => $row['nama_dosen'],
                    'type' => UserType::DOSEN,
                    'password' => Hash::make('12345678')
                ]);

                $user->dosen()->create([
                    'nip' => $row['nip_dosen']
                ]);
            }
        }

        // Schedule
        $schedule = Schedule::create([
            'dosen_id' => isset($user) ? $user->dosen->id : null,
            'kode_matkul' => $row['kdmk'],
            'nama_matkul' => $row['nama_matkul'],
            'kode_kelompok' => $row['klpk'],
            'sks' => $row['sks'],
            'kuota' => $row['kuota'],
            'jumlah_mahasiswa' => $row['jml_mhs']
        ]);

        // Classroom
        $sessionMax = 3;

        for ($i=1; $i<=$sessionMax; $i++) {
            $hari = trim($row['hari_'.$i]);
            $jam = trim($row['jam_'.$i]);
            $ruang = trim($row['ruang_'.$i]);

            if (
                ($hari !== "" && $hari !== "-") 
                && ($jam !== "" && $jam !== "-") 
                && ($ruang !== "" && $ruang !== "-")
            ) {
                $classroom = Classroom::firstOrCreate([ 'name' => $ruang ]);

                $time = explode('-', $jam);

                ScheduleSession::create([
                    'schedule_id' => $schedule->id,
                    'classroom_id' => $classroom->id,
                    'day' => $hari,
                    'time_start' => str_replace('.', ':', $time[0]).':00',
                    'time_end' => str_replace('.', ':', $time[1]).':00'
                ]); 
            }
        }
    }
}
