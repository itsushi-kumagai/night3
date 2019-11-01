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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'facebook' => [
        'client_id' =>  env('FACEBOOK_APP_ID','1105214566355013'),
        'client_secret' => env('FACEBOOK_APP_SECRET','0d1026ab3bf73248db83601a66e79411'),
        'redirect' =>  env('FACEBOOK_CALLBACK_URL','http://localhost:8000/callback'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID','750053582764-fq9hrid01r82n02jd6s6fl8usmcublfj.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET','vSmeAiyY5kGwIkgEFd2dGArS'),
        'redirect' => env('GOOGLE_REDIRECT','http://localhost:8000/callback'),
      ],
      

];
