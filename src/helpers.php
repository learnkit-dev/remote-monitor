<?php

use Illuminate\Log\LogManager;
use Illuminate\Log\Logger;

if (!function_exists('rlog')) {
    /**
     * Get the remote log channel instance.
     *
     * @return \Psr\Log\LoggerInterface
     */
    function rlog($message = '', $context = []): LogManager|Logger
    {
        $log = \Illuminate\Support\Facades\Log::channel('remote');

        if (filled($message)) {
            $log->info($message, $context);
        }
        
        return $log;
    }
}