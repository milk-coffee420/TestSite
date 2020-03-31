<?php

namespace App\Socialite;

use Laravel\Socialite\SocialiteManager;
use Illuminate\Support\Arr;

class MySocialManager extends SocialiteManager{

    protected function createYahooDriver()
    {
        //services.phpの設定情報を読む
        $config =  config('services.yahoo');
        //設定情報と共にプロバイダを生成
        return $this->buildProvider(
            'App\Socialite\YahooProvider',$config
        );
    }


}