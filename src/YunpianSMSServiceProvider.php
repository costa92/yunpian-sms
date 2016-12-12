<?php

namespace Costa92\YunpianSMS;

use Costa92\YunpianSMS\Services\YunpianSMSService;
use Illuminate\Support\ServiceProvider;

class YunpianSMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => base_path('config/yunpian.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('YunpianSMSService', function($app){
            return new YunpianSMSService();
        });
    }
}
