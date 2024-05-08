<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use App\Models\User;
use App\Models\Schedule;
use App\Constants\UserType;

class MahasiswaImport implements ToCollection, WithStartRow, WithEvents
{
    private static $scheduleId;
    public static $isSuccess = false;
    public static $message;

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => [self::class, 'beforeSheet'],
        ];
    }

    public static function beforeSheet(BeforeSheet $event)
    {
        $matkul = $event->getDelegate()->getCell('C1')->getValue();
        $matkulArr = explode('-', $matkul);
        $kodeMatkul = trim(strtoupper($matkulArr[1]));

        $kodeKelompok = $event->getDelegate()->getCell('C2')->getValue();

        $schedule = Schedule::where('kode_matkul', $kodeMatkul)->where('kode_kelompok', $kodeKelompok)->first();
        if (!isset($schedule)) {
            self::$message = 'Kode Kelompok tidak ditemukan';
            return;
        }

        self::$scheduleId = $schedule->id;
    }

    public function startRow(): int
    {
        return 3;
    }

    public function collection(Collection $rows)
    {
        if (isset(self::$scheduleId)) {
            foreach ($rows as $row) {
                $user = User::create([
                    'code' => $row[2],
                    'fullname' => $row[3],
                    'type' => UserType::MAHASISWA,
                    'password' => Hash::make('12345678'),
                ]);

                $mhs = $user->mahasiswa()->create([
                    'nim' => $row[2],
                ]);

                $mhs->schedules()->attach(self::$scheduleId);
            }

            self::$isSuccess = true;
        }
    }
}
