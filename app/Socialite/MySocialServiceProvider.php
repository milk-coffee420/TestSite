<?php

namespace App\Socialite;

use Laravel\Socialite\SocialiteServiceProvider;
use Laravel\Socialite\Contracts\Factory;
use App\Socialite\MySocialManager;

class MySocialServiceProvider extends SocialiteServiceProvider
{


    public function register()
    {
        $this->app->singleton(Factory::class, function ($app) {
            return new MySocialManager($app);
        });
    }


}