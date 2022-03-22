<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        ResponseFactory::macro('api', function ($data = null, $error = 0, $message = '') {
            return response()->json([
                'data'    => $data,
                'error'   => $error, //1 or 0
                'message' => $message,
            ]);
        });

        Http::macro('firebase', function () {
            return Http::withHeaders([
                'Authorization'  => env("AUTHORIZATION_KEY"),
                'Content-Type'   => 'application/json',
            ])->baseUrl('https://fcm.googleapis.com/fcm/send');
        });

    }//end of boot

}//end of app service provider
