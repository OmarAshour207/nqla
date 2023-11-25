<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiOtp
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->tokenCan('otp_success'))
            return $next($request);
        return response()->json(__('Not Authorized'), 401);
    }
}
