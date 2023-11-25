<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(Auth::user()->role) && Auth::user()->role == 'admin')
            return $next($request);
        return redirect()->route('dashboard.login');
    }
}
