<?php

namespace PhpProject;


use Monolog\Logger;

final class MonologLoggerAdapter implements LoggerNotifyInterface
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function info(string $message)
    {
        $this->logger->info($message);
    }

}