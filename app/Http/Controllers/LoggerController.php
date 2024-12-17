<?php

namespace App\Http\Controllers;

use Om\TestLogger\Classes\Logger;

class LoggerController extends Controller
{
    protected Logger $logger;

    public function __construct()
    {
        $this->logger = app('custom_logger');
    }

    /**
     * • Sends a log message to the default logger.
     * @throws \Exception
     */
    public function log()
    {
        $message = 'default log';
        $this->logger->send($message);
        echo "$message was send via {$this->logger->getType()}";
    }

    /**
     * • Sends a log message to a special logger.
     *
     * • @param string $type
     * @throws \Exception
     */
    public function logTo(string $type)
    {
        $message = 'special log';
        $this->logger->sendByLogger($message, $type);
        echo "$message was send via {$this->logger->getType()}";
    }

    /**
     * • Sends a log message to all loggers.
     * @throws \Exception
     */
    public function logToAll()
    {
        foreach ($this->logger->channels as $key => $channel) {
            $message = "$key log";
            $this->logger->sendByLogger($message, $key);
            echo "$message was send via {$this->logger->getType()} \n";

        }
    }
}
