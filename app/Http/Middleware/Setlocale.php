<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        app()->setLocale($request->segment(1));
        return $next($request);
    }
}