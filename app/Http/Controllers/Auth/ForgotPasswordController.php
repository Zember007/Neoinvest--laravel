<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => ['required', 'string', 'max:255'],
        ]);

        $user = User::query()
            ->where('email', $request->login)
            ->orWhere('phone', $request->login)
            ->first();

        if ($user) {
            $passwordReset = PasswordReset::firstOrCreate(['user_id' => $user->id], ['token' => Str::random(32)]);
            if ($passwordReset->wasRecentlyCreated) {
                $user->sendVerificationNotification(false, true);
            }

            return redirect()->route('reset-password.index', $passwordReset->token);
        }

        throw ValidationException::withMessages([
            'login' => [trans('auth.failed')],
        ]);
    }
}
