<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN', 'suuty.com'),
        'secret' => env('MAILGUN_SECRET', 'key-7318a6f3ec892088b4482b922f7c3f43'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => Suuty\User::class,
        'key' => env('pk_live_NO7myZuzTbbe6YPL02NtbiXx'),
        'secret' => env('sk_live_z7QSbzJ6WwQavNDlkNRMd0Jh'),
    ],

    // services.php

    'facebook' => [
        'client_id' => '1648163565245679',
        'client_secret' => '1e22a88f8ff2e416aa90db4f7c721d41',
        'redirect' => '/callback',
    ],

];
