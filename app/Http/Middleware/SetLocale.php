<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Lugha zinazoruhusiwa
     */
    protected $allowedLocales = ['en', 'sw'];

    public function handle(Request $request, Closure $next)
    {
        // Angalia kama kuna lugha iliyohifadhiwa kwenye session
        $locale = Session::get('locale', config('app.locale'));

        // Hakikisha lugha inaruhusiwa
        if (!in_array($locale, $this->allowedLocales)) {
            $locale = config('app.locale'); // Rudi kwa default (en)
        }

        // Weka lugha
        App::setLocale($locale);

        return $next($request);
    }
}