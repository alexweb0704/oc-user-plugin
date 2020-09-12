<?php

namespace GeeksLab\User\Middlewares;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware extends BaseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
