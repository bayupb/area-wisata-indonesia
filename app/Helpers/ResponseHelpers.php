<?php

namespace App\Helpers;

class ResponseHelpers
{
    const ERROR = 'Ada masalah pada server, silahkan cek kembali code anda!';
    public static function ResponseSuccess($status, $message, $data)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }
    public static function getResponseErrorQuery($status, $message)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
        ]);
    }
    public static function getResponseError($status)
    {
        return response()->json([
            'status' => $status,
            'message' => self::ERROR,
        ]);
    }
}
