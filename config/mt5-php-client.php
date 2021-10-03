<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'HOST' => env('METATRADER5_HOST', '127.0.0.1'),
    'PORT' => env('METATRADER5_PORT', 443),
    'USERNAME' => env('METATRADER5_USERNAME', null),
    'PASSWORD' => env('METATRADER5_PASSWORD', null),
];
