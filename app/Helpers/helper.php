<?php

namespace App\Helpers;

if (!function_exists('composeReply')) {
    function composeReply(bool $success, string $message, $payload, int $statusCode=200) {
        return response()->json([
            'success' => $success,
            'message' => $message, 
            'payload' => $payload
        ]);
    }
}