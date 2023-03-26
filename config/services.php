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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '287961331287-oi9a43oshodqvnfn6ldmcbhkm9l3st54.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://ecomm.proshenjit.info/google/login',
    ],
    'facebook' => [
        'client_id' => '514070477271629',
        'client_secret' => '3267b3af5457d733c3ed62382b657038',
        'redirect' => 'https://ecomm.proshenjit.info/facebook/login',
    ],

];
