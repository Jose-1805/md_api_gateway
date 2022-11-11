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

    'cluster_services' => [
        'md_counter_service' => ['base_uri' => env('MD_COUNTER_SERVICE_BASE_URL'), 'access_secret' => env('MD_COUNTER_SERVICE_ACCESS_SECRET')],
        'md_file_service' => ['base_uri' => env('MD_FILE_SERVICE_BASE_URL'), 'access_secret' => env('MD_FILE_SERVICE_ACCESS_SECRET')],
        'md_seller_service' => ['base_uri' => env('MD_SELLER_SERVICE_BASE_URL'), 'access_secret' => env('MD_SELLER_SERVICE_ACCESS_SECRET')],
    ],

    'access_secrets' => env('ACCESS_SECRETS', 'PlyxRzUxpm5GG0r3bOOJkufTT9kUnnYj')
];
