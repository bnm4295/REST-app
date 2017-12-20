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
        'domain' => env('MAILGUN_DOMAIN', 'sandbox6cc5bc4418e1454495f5a37c8e26f065.mailgun.org'),
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
        'key' => env('pk_test_jrelq9mh68g8VvgUbU45vtHI'),
        'secret' => env('sk_test_KSSmMrMppIdQdSwCN1N1XHfx'),
    ],

];
