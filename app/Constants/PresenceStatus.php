<?php

namespace App\Constants;

use App\Constants\BaseConstant;

class PresenceStatus extends BaseConstant
{
    const SOON = 1;
    const TODAY = 2;
    const DONE = 3;
    const NO_CLASS = 4;
    const PRESENT = 5;
    const ABSENT_WITH_REASON = 6;
    const ABSENT_WITHOUT_REASON = 7;


    public static function labels()
    {
        return [
            static::SOON => 'Belum Dimulai',
            static::TODAY => 'Hari Ini',
            static::DONE => 'Selesai',
            static::NO_CLASS => 'Tidak Ada Kelas',
            static::PRESENT => 'Hadir',
            static::ABSENT_WITH_REASON => 'Sakit / Izin',
            static::ABSENT_WITHOUT_REASON => 'Tidak Hadir'
        ];
    }
}