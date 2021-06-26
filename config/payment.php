<?php

return [
    'stripe' => [
        'currency' => env('STRIPE_CURRENCY'),
        'locale' => env('STRIPE_LOCALE'),
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'items' => [],
    ]
];
