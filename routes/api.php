<?php

use App\Http\Controllers\ProcessPayKassaCallback;
use App\Http\Middleware\VerifyPayKassaSignature;

Route::middleware([VerifyPayKassaSignature::class])
    ->post('paykassa/callback', ProcessPayKassaCallback::class)->name('paykassa.callback');
