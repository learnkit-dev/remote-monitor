<?php

namespace LearnKit\RemoteMonitor\Logging;

use Monolog\Logger;

class CreateElasticsearchLogger
{
    public function __invoke()
    {
        $logger = new Logger('elasticsearch');
        $logger->pushHandler(new ElasticsearchHandler());

        return $logger;
    }
}
