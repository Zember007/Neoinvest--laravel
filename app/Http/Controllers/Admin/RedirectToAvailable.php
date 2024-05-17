<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RedirectToAvailable extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $route = collect(config('admin.sidebar'))
            ->keys()
            ->filter(fn($name) => Gate::allows("admin_view_$name"))
            ->first();

        return redirect()->route("admin.$route.index");
    }
}
