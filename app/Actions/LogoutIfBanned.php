<?php

namespace App\Actions;

use Illuminate\Http\Request;

class LogoutIfBanned
{
    public function __invoke(Request $request, $next)
    {
        if (auth()->check() && auth()->user()->is_banned) {
            auth(config('fortify.guard'))->logout();

            return redirect()->route('login')->with('error', trans('general.banned'));
        }

        return $next($request);
    }
}