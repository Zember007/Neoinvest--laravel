<?php

namespace App\Http\Middleware;

use App\Actions\LogoutIfBanned;
use Closure;
use Illuminate\Http\Request;

class RedirectIfBanned
{
    public function handle(Request $request, Closure $next)
    {
        return with(new LogoutIfBanned())->__invoke($request, $next);
    }
}
