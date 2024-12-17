<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Om\TestLogger\Classes\Logger;

class LoggerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('custom_logger', function ($app) {
            return new Logger(config('custom-logger'));
        });
    }

    public function boot(): void
    {
    }
}
