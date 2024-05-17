<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'ucaller' => [
        'service_id' => env('UCALLER_SERVICE_ID'),
        'secret' => env('UCALLER_SECRET'),
        'init_endpoint' => env('UCALLER_INIT_ENDPOINT', 'https://api.ucaller.ru/v1.0/initCall'),
        'repeat_endpoint' => env('UCALLER_REPEAT_ENDPOINT', 'https://api.ucaller.ru/v1.0/initRepeat'),
    ],

    'paykassa' => [
        'payment_endpoint' => 'https://paykassa.app/sci/0.4/index.php',
        'currency_endpoint' => 'https://currency.paykassa.pro/index.php',
        'sci_id' => env('PAYKASSA_SCI_ID'),
        'sci_key' => env('PAYKASSA_SCI_KEY'),
    ],

];
