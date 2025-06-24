<?php

namespace LearnKit\RemoteMonitor\Logging;

use Elastic\Elasticsearch\ClientBuilder;
use Monolog\Handler\AbstractProcessingHandler;
use Monolog\Level;

class ElasticsearchHandler extends AbstractProcessingHandler
{
    protected $client;
    protected $index;

    public function __construct(int|string|Level $level = Level::Debug, bool $bubble = true)
    {
        parent::__construct($level, $bubble);

        $this->client = ClientBuilder::create()
            ->setHosts([config('remote-monitor.elastic.host')])
            ->setApiKey(config('remote-monitor.elastic.api_key'))
            ->build();

        $this->index = config('remote-monitor.elastic.logs_index');
    }

    protected function write(array|\Monolog\LogRecord $record): void
    {
        $params = [
            'index' => $this->index,
            'body' => [
                'timestamp' => $record['datetime']->format('Y-m-d H:i:s'),
                'level' => $record['level_name'],
                'message' => $record['message'],
                'context' => $record['context'],
                'extra' => $record['extra'],
                'channel' => $record['channel'],
            ]
        ];

        $this->client->index($params);
    }
}