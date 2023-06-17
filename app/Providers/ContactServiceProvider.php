<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $phoneNumbers = '+6282110762673';
        $whatsappNumbers = '+6282110762673';
        $emailReceiver = 'elbarakreasi@gmail.com';
        try {
            // $phoneNumbers = Redis::get('phone_numbers') ?? $phoneNumbers;
            // $whatsappNumbers = Redis::get('whatsapp_numbers') ?? $whatsappNumbers;
            // $emailReceiver = Redis::get('email_receiver') ?? $emailReceiver;
        }catch (Exception $e) {
            // do nothing
        }

        View::share('phoneNumbers', $phoneNumbers);
        View::share('whatsappNumbers', $whatsappNumbers);
        View::share('emailReceiver', $emailReceiver);
    }
}
