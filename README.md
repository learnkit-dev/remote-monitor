# Remote Monitor

A Laravel package for remote monitoring with Elasticsearch logging integration.

## Installation

Install the package via Composer:

```bash
composer require learnkit/remote-monitor
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="LearnKit\RemoteMonitor\RemoteMonitorServiceProvider"
```

Configure your environment variables:

```env
REMOTE_ELASTIC_HOST=your-elasticsearch-host
REMOTE_ELASTIC_API_KEY=your-api-key
REMOTE_ELASTIC_LOGS_INDEX=remote-logs
```

## Usage

Use the `rlog()` helper function to log messages to Elasticsearch:

```php
// Simple logging
rlog('User logged in', ['user_id' => 123]);

// Get logger instance
$logger = rlog();
$logger->info('Custom message');
$logger->error('Error occurred', ['error' => $exception->getMessage()]);
```

## Requirements

- PHP ^8.3
- Laravel ^10.0|^11.0|^12.0

## License

MIT License