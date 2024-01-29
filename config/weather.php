<?php

return [
    'openweathermap' => [
        'api_key' => env('OPENWEATHERMAP_API_KEY'),
        'url' => env('OPENWEATHERMAP_URL', 'https://api.openweathermap.org/data/3.0/onecall'),
    ]
];
