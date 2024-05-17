<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;
use Laravel\Fortify\Contracts\TwoFactorAuthenticationProvider;
use Laravel\Fortify\Http\Requests\TwoFactorLoginRequest;

class TwoFactorAuthenticationController
{
    public function destroy(TwoFactorLoginRequest $request, DisableTwoFactorAuthentication $disable): RedirectResponse
    {
        $isCodeValid = app(TwoFactorAuthenticationProvider::class)->verify(
            decrypt($request->user()->two_factor_secret), $request->code ?? ""
        );
        if ($isCodeValid) {
            $disable($request->user());

            session()->flash('status', 'two-factor-authentication-disabled');
        }

        return back();
    }
}