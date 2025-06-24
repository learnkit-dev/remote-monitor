<?php

namespace LearnKit\RemoteMonitor;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use LearnKit\RemoteMonitor\Logging\CreateElasticsearchLogger;

class RemoteMonitorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/remote-monitor.php', 'remote-monitor');

        $this->setupRemoteLog();
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/remote-monitor.php' => config_path('remote-monitor.php'),
        ], 'remote-monitor-config');
    }

    protected function setupRemoteLog(): void
    {
        Config::set([
            'logging.channels.remote' => [
                'driver' => 'custom',
                'via' => CreateElasticsearchLogger::class,
                'level' => 'debug',
            ],
        ]);
    }
}