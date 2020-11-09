<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use App;

class Localization
{
    public function handle($request, Closure $next)
    {

        if (!Auth::check())
          return $next($request);

        App::setLocale(Auth::user()->getLocale() ?? 'en');
        return $next($request);
    }
}