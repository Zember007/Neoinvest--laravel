<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Http;

class PayKassaService
{
    public function createChargeUrl(Transaction $transaction, string $method)
    {
        $response = Http::post($this->createPaymentUrl($transaction, config('finances.supported.'.$method)));

        return $response->json('data.url');
    }

    public function createPaymentUrl(Transaction $transaction, array $method): string
    {
        return config('services.paykassa.payment_endpoint').'?'.http_build_query([
                'sci_id' => (int) config('services.paykassa.sci_id'),
                'sci_key' => config('services.paykassa.sci_key'),
                'func' => 'sci_create_order',
                'amount' => $transaction->amount / $this->getCurrencyRate($method['currency']),
                'currency' => $method['currency'],
                'order_id' => $transaction->id,
                'comment' => $transaction->id,
                'system' => $method['system'],
            ]);
    }

    public function createVerificationUrl(string $hash): string
    {
        return config('services.paykassa.payment_endpoint').'?'.http_build_query([
                'sci_id' => (int) config('services.paykassa.sci_id'),
                'sci_key' => config('services.paykassa.sci_key'),
                'func' => 'sci_confirm_order',
                'private_hash' => $hash,
            ]);
    }

    private function getCurrencyRate(string $currency)
    {
        $response = Http::get(config('services.paykassa.currency_endpoint'), [
            'currency_in' => $currency,
            'currency_out' => 'USDT',
        ]);

        return $response->json('data.value');
    }
}