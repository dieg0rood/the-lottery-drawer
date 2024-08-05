<?php

use App\Exception\ExceptionHandler;

set_exception_handler([ExceptionHandler::class, 'handleException']);

set_error_handler(function($severity, $message, $file, $line) {
    if (!(error_reporting() & $severity)) {
        return;
    }

    throw new \ErrorException($message, 0, $severity, $file, $line);
});

register_shutdown_function(function() {
    $error = error_get_last();
    if ($error !== null) {
        $errorType = $error['type'];
        $errorMessage = $error['message'];
        $errorFile = $error['file'];
        $errorLine = $error['line'];

        if ($errorType === E_ERROR) {
            ExceptionHandler::handleException(new \ErrorException($errorMessage, 0, $errorType, $errorFile, $errorLine));
        }
    }
});