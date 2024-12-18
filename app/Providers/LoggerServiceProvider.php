<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Om\TestLogger\Classes\Logger;
use Om\TestLogger\Interfaces\LoggerInterface;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(LoggerInterface::class, function ($app) {
            return new Logger(config('custom-logger'));
        });
    }

    public function boot(): void
    {
    }
}
