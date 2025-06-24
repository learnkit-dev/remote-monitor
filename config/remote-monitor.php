<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Remote Monitor Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the Remote Monitor
    | package. You can customize the behavior of the monitoring system here.
    |
    */

    'elastic' => [
        'host' => env('REMOTE_ELASTIC_HOST'),
        'api_key' => env('REMOTE_ELASTIC_API_KEY'),
        'logs_index' => env('REMOTE_ELASTIC_LOGS_INDEX', 'remote-logs'),
    ],
];