<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Validation\Rule;

class SwitchLanguage extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'locale' => ['required', 'string', Rule::in(array_keys(config('countries')))],
        ]);

        if (Auth::check()) {
            auth()->user()->update(['locale' => $validated['locale']]);
        }
        Cookie::queue('locale', $validated['locale'], now()->addDecade()->diffInSeconds(now()));

        return back();
    }
}
