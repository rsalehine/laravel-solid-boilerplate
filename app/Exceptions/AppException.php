<?php

namespace App\Exceptions;

use Exception;

class AppException extends Exception
{
    public function __construct(array $message)
    {
        parent::__construct($message['message'], $message['code']);
    }
}
