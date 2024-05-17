<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Rules\VerificationCodeValid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class VerificationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->isVerified()) {
            return redirect()->intended(config('fortify.home'));
        }

        $payload = [
            'title' => trans('auth.verification'),
            'submitTo' => route('verify.store'),
            'resendTo' => route('verify.resend'),
            'login' => $request->user()->login,
        ];

        return $request->user()->hasEmailFilled()
            ? view('auth.verify-email', $payload)
            : view('auth.verify-phone', $payload);
    }

    public function resend(Request $request): RedirectResponse
    {
        $identifier = 'verify-resend:'.optional($request->user())->id ?: ip();
        if (RateLimiter::remaining($identifier, 1)) {
            RateLimiter::hit($identifier);

            if ($request->user()->isVerified()) {
                return redirect()->intended(config('fortify.home'));
            }

            $request->user()->sendVerificationNotification(true);

            return back();
        }

        return back()->with('error', trans('general.too_many_attempts'));
    }

    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->isVerified()) {
            return redirect()->intended(config('fortify.home'));
        }

        $request->validate(['code' => ['required', 'integer', new VerificationCodeValid($request->user())]]);

        $request->user()->markAsVerified();

        return redirect()->intended(config('fortify.home'));
    }

    public function update(Request $request): RedirectResponse
    {
        $identifier = 'verify-change-login:'.optional($request->user())->id ?: ip();
        if (RateLimiter::remaining($identifier, 1)) {
            RateLimiter::hit($identifier);

            if ($request->user()->isVerified()) {
                return redirect()->intended(config('fortify.home'));
            }

            $request->validate([
                'login' => ['required', 'string', 'max:255', 'unique:users,email', 'unique:users,phone'],
            ]);

            $request->user()->hasEmailFilled()
                ? $request->user()->update(['email' => $request->login])
                : $request->user()->update(['phone' => $request->login]);

            $request->user()->sendVerificationNotification();

            return back();
        }

        return back()->with('error', trans('general.too_many_attempts'));
    }
}
