<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function deletePhoto(Request $request): RedirectResponse
    {
        $request->user()->deleteProfilePhoto();

        return redirect()->route('settings');
    }
}
