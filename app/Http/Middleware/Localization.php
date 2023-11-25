<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->request->get('locale');

        if($locale == 'en')
            session()->put('locale', 'en');

        if(!session()->has('locale'))
            session()->put('locale', 'en');

        app()->setLocale(session()->get('locale'));

        return $next($request);
    }
}
