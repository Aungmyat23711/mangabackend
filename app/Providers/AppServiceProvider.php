<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Validator::extend('is_base64_mime', function ($attribute, $value, $parameters) {
            $encode_string = $value;
            $result = explode("/", mime_content_type($encode_string))[1];
            if ($result == "png") {
                return true;
            }
        });
    }
}
