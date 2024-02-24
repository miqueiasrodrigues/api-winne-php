<?php

namespace App;

require_once __DIR__.'/../Config/config.php';

class Response
{
    public static function json(int $status = 200, string $message = 'success', $data = null)
    {

        $response = json_encode([
            'status' => API_IS_ACTIVE ? $status : 400,
            'message' => API_IS_ACTIVE ? $message : 'api is not running.',
            'data' => API_IS_ACTIVE ? $data : null,
        ]);
        
        return $response;
    }
}
