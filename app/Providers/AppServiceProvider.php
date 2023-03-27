<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Blade::directive('currency', function ( $expression ) { return "Rp <?= number_format($expression,0,',','.'); ?>"; });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('phoneNumbers', Redis::get('phone_numbers') ?? '+6281234567890');
        View::share('whatsappNumbers', Redis::get('whatsapp_numbers') ?? '+6281234567890');
        View::share('emailReceiver', Redis::get('email_receiver') ?? 'elbarakreasi@gmail.com');
    }
}
