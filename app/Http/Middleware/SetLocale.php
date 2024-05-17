<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->routeIs('admin.*')) {
            app()->setLocale(config('interface.admin_locale'));
        } else {
            app()->setLocale(Cookie::get('locale') ?? app()->getLocale());
            if (auth()->check() && auth()->user()->locale !== app()->getLocale()) {
                auth()->user()->update(['locale' => app()->getLocale()]);
            }
        }

        return $next($request);
    }
}
