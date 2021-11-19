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
    'facebook' => [
        'client_id' => '1334539427004968',
        'client_secret' => '46e8adce413b302c121c13915eee622b',
        'redirect' => env('URL').'api/auth/facebook/callback',
    ],
    'google' => [
        'client_id' => '1053372575992-0o314k0ojr9t85iac0g78fs6bag2pd89.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => env('URL').'api/auth/google/callback',
    ],
];
