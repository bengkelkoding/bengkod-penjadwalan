<?php

namespace App\Constants;

use App\Constants\BaseConstant;

class DayConstant extends BaseConstant
{
    const MINGGU = 0;
    const SENIN = 1;
    const SELASA = 2;
    const RABU = 3;
    const KAMIS = 4;
    const JUMAT = 5;
    const SABTU = 6;


    public static function labels()
    {
        return [
            static::MINGGU => 'MINGGU',
            static::SENIN => 'SENIN',
            static::SELASA => 'SELASA',
            static::RABU => 'RABU',
            static::KAMIS => 'KAMIS',
            static::JUMAT => 'JUMAT',
            static::SABTU => 'SABTU'
        ];
    }
}