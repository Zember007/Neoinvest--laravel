<?php

namespace App\Http\Middleware;

use App\Services\PayKassaService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class VerifyPayKassaSignature
{
    private PayKassaService $merchant;

    public function __construct(PayKassaService $merchant)
    {
        $this->merchant = $merchant;
    }

    public function handle(Request $request, Closure $next)
    {
        $response = Http::post($this->merchant->createVerificationUrl(request('private_hash')));

        abort_if($response->json('error') === true, Response::HTTP_BAD_REQUEST);

        return $next($request);
    }
}
