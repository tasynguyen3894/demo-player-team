<?php

namespace App\Exceptions;

use Exception;

class AdminAPIException extends Exception
{
    public function statusCode() {
        return 401;
    }
}
