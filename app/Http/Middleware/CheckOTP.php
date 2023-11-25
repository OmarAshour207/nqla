<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOTP
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('otp_code')) {
            if (auth()->user()->role == 'admin')
                return redirect()->route('dashboard.showotp');
            return redirect()->route('frontend.showotp');
        }
        return $next($request);
    }
}
