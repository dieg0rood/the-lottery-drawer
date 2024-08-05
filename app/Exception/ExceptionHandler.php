<?php

namespace App\Exception;

class ExceptionHandler {

    public static function handleException(\Throwable $exception) {
        header('Content-Type: application/json', true, 500);
        $response = [
            'error' => 'Internal Server Error',
            'message' => $exception->getMessage(),
            'code' => $exception->getCode()
        ];
        echo json_encode($response);
    }
}