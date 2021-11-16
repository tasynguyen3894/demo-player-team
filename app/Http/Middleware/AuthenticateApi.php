<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Exceptions\AdminAPIException;

class AuthenticateApi extends Middleware
{
    protected function unauthenticated($request, array $guards) {
        throw new AdminAPIException('Anauthenticated');
    }
}
