<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Om\TestLogger\Classes\Logger;
use Om\TestLogger\Interfaces\LoggerInterface;

class LoggerController extends Controller
{

    public function __construct(protected LoggerInterface $logger)
    {
    }

    /**
     * • Sends a log message to the default logger.
     * @throws Exception
     */
    public function log()
    {
        $message = request('message', 'log action');
        $this->logger->send($message);
        return response("$message was send via {$this->logger->getType()}");
    }

    /**
     * • Sends a log message to a special logger.
     *
     * •
     * @param string $type
     * @return ResponseFactory|Application|Response
     */
    public function logTo(string $type)
    {
        $message = request('message', 'logTo action');
        $this->logger->sendByLogger($message, $type);
        return response("$message was send via {$type}");
    }

    /**
     * • Sends a log message to all loggers.
     * @throws Exception
     */
    public function logToAll()
    {
        $message = request('message', 'logToAll action');
        $response = '';
        foreach (array_keys(config('custom-logger.channels')) as $channel) {
            $this->logger->sendByLogger($message, $channel);
            $response .= "$message was send via {$channel} \n";
        }
        return response($response);
    }
}
