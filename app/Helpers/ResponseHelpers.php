<?php

namespace App\Helpers;

class ResponseHelpers
{
    public static function ResponseSuccess($status, $message, $data)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }
}
