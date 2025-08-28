<?php

namespace App\Utils;

class ApiResponser
{
    public static function success($data = [], $message = 'success', $code = 200, $http_code = 200)
    {
        $body = [
            'ok' => true,
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];

        return response()->json($body, $http_code);
    }

    public static function error($data = [], $message = 'error', $code = 400, $http_code = 400)
    {
        $body = [
            'ok' => false,
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];

        return response()->json($body, $http_code);
    }
}
