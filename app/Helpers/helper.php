<?php

use Illuminate\Support\Str;
use App\Models\AdminSetting;
use App\Models\Presence;

if (!function_exists('composeReply')) {
    function composeReply(bool $success, string $message, $payload, int $statusCode = 200)
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'payload' => $payload,
        ]);
    }
}

if (!function_exists('generateQrCode')) {
    function generateQrCode()
    {
        $code = Str::random(32);

        if (Presence::where('qr_code', $code)->exists()) {
            return generateQrCode();
        }

        return $code;
    }
}

if (!function_exists('getSettingValue')) {
    function getSettingValue($keyName)
    {
        $setting = AdminSetting::where('key', $keyName)->first();
        if (!isset($setting)) 
            return null;

        return $setting->value;
    }
}
