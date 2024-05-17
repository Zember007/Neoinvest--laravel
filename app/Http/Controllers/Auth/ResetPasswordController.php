<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use App\Models\PasswordReset;
use App\Rules\VerificationCodeValid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

class ResetPasswordController extends Controller
{
    use PasswordValidationRules;

    public function index(Request $request, string $token)
    {
        $passwordReset = PasswordReset::whereToken($token)->firstOrFail();

        if ($passwordReset->is_verified) {
            return view('auth.reset-password');
        }

        $payload = [
            'title' => trans('auth.resetting_password'),
            'submitTo' => route('reset-password.store'),
            'resendTo' => route('reset-password.resend'),
            'login' => $passwordReset->user->login,
        ];

        return $passwordReset->user->hasEmailFilled()
            ? view('auth.verify-email', $payload)
            : view('auth.verify-phone', $payload);
    }

    public function resend(Request $request): RedirectResponse
    {
        $identifier = 'reset-password-reset:'.optional($request->user())->id ?: ip();
        if (RateLimiter::remaining($identifier, 1)) {
            RateLimiter::hit($identifier);

            $this->validateToken($request);
            $reset = PasswordReset::whereToken($request->token)->firstOrFail();

            if ($reset->is_verified) {
                return redirect()->route('reset-password.index', ['token' => $request->token]);
            }

            $reset->user->sendVerificationNotification(true, true);

            return back();
        }

        return back()->with('error', trans('general.too_many_attempts'));
    }

    private function validateToken(Request $request)
    {
        $request->validate(['token' => ['required', 'string']]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validateToken($request);
        $reset = PasswordReset::whereToken($request->token)->firstOrFail();

        if ($reset->is_verified) {
            $request->validate([
                'password' => $this->passwordRules(),
            ]);
            $reset->user->update([
                'password' => Hash::make($request->password),
            ]);
            $reset->delete();

            session()->flash('success', trans('auth.password_changed_successfully'));

            return redirect()->route('login');
        }

        $request->validate([
            'code' => ['required', 'integer', new VerificationCodeValid($reset->user)],
        ]);
        $reset->update([
            'is_verified' => true,
        ]);

        return redirect()->route('reset-password.index', ['token' => $request->token]);
    }
}
