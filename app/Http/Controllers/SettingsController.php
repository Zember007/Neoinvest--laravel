<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'country' => ['sometimes', 'required', 'string'],
            'login' => ['sometimes', 'required', 'string'],
            'phone_country' => ['sometimes', 'required_with:login', 'string'],
        ]);

        if ($request->has('country')) {
            $request->user()->update([
                'country' => request('country'),
            ]);
        }
        if ($request->has('login')) {
            $request->user()->update([
                'secondary_phone' => request('login'),
                'secondary_phone_country' => request('phone_country'),
            ]);
        }

        session()->flash('success', trans('settings.saved_successfully'));

        return redirect()->route('settings');
    }
}
