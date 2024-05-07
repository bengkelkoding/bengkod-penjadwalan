<?php

namespace App\Constants;

class BaseConstant
{
    public static function labels()
    {
    }

    public static function rules()
    {
        return collect(static::labels())->flatten()->toArray();
    }

    public static function getIds()
    {
        return collect(static::labels())->flip()->toArray();
    }

    public static function label($index)
    {
        if (array_key_exists($index, static::labels())) {
            return static::labels()[$index];
        }
        return null;
    }

    public static function getId($index)
    {
        $index = strtolower($index);
        if (array_key_exists($index, static::getIds())) {
            return static::getIds()[$index];
        }
        return null;
    }
}
