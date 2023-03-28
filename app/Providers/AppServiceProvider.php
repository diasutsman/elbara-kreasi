<?php

namespace App\Providers;

use Exception;
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
        $phoneNumbers = '+6281234567890';
        $whatsappNumbers = '+6281234567890';
        $emailReceiver = 'elbarakreasi@gmail.com';
        try {
            $phoneNumbers = Redis::get('phone_numbers') ?? $phoneNumbers;
            $whatsappNumbers = Redis::get('whatsapp_numbers') ?? $whatsappNumbers;
            $emailReceiver = Redis::get('email_receiver') ?? $emailReceiver;
        }catch (Exception $e) {
            // do nothing
        }

        View::share('phoneNumbers', $phoneNumbers);
        View::share('whatsappNumbers', $whatsappNumbers);
        View::share('emailReceiver', $emailReceiver);
    }
}
