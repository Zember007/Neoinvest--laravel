<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Undisguise extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        abort_unless(session()->has('disguised_admin_id'), Response::HTTP_NOT_FOUND);

        auth()->loginUsingId(session('disguised_admin_id'));

        session()->forget('disguised_admin_id');

        return redirect()->route('admin.index');
    }
}
