<?php

namespace App\Util;

class ResponseUtil {
    public static function jsonResponse(array $data, int $statusCode = 200) {
        header('Content-Type: application/json', true, $statusCode);
        echo json_encode($data);
        exit;
    }
}