<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class Localization
{
    public function handle($request, Closure $next)
    {
        App::setLocale(Auth::user()->getLocale() ?? 'en');
        return $next($request);
    }
}