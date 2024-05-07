<?php

namespace App\Constants;

use App\Constants\BaseConstant;

class UserType extends BaseConstant
{
    const DOSEN = "DOSEN";
    const MAHASISWA = "MAHASISWA";


    public static function labels()
    {
        return [
            static::DOSEN => 'Dosen',
            static::MAHASISWA => 'Mahasiswa'
        ];
    }
}