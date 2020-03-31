<?php

namespace App\Socialite;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;
use GuzzleHttp\ClientInterface;
use Illuminate\Support\Arr;

class YahooProvider extends AbstractProvider implements ProviderInterface
{


    //scopeの区切り文字設定
    protected $scopeSeparator = ' ';

    //スコープ設定
    protected $scopes = [
        'openid',
        'profile',
        'email',
    ];

    //認証用URL($stateはオプション)
    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://auth.login.yahoo.co.jp/yconnect/v2/authorization', $state);
    }

    //token取得用URL
    protected function getTokenUrl()
    {
        return 'https://auth.login.yahoo.co.jp/yconnect/v2/token';
    }

    //Token取得の際のオプション
    //Basic認証と必要なPOSTパラメータを送付
    public function getAccessToken($code)
    {

        $basic_auth_key = base64_encode($this->clientId.":".$this->clientSecret);

        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            //認証
            'headers' => [
                'Authorization' => 'Basic '.$basic_auth_key,
            ],

            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $this->redirectUrl
            ],
        ]);

        return $this->parseAccessToken($response->getBody());
    }

    //ユーザー情報取得
    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get('https://userinfo.yahooapis.jp/yconnect/v2/attribute?schema=openid', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }


    protected function mapUserToObject(array $user)
    {

        return (new User)->setRaw($user)->map([
            'id' => Arr::get($user, 'sub'),
            'name' => Arr::get($user, 'name'),
            'email' => Arr::get($user, 'email'),
            'birth_year' => Arr::get($user, 'birthday'),
            'gender'     => Arr::get($user, 'gender'),
            'avatar' => $avatarUrl = Arr::get($user, 'picture'),
        ]);
    }


    //Basic認証が必要
    public function getAccessTokenResponse($code)
    {
        $postKey = (version_compare(ClientInterface::VERSION, '6') === 1) ? 'form_params' : 'body';

        $basic_auth_key = base64_encode($this->clientId.":".$this->clientSecret);

        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            'headers' => [
                'Authorization' => 'Basic '.$basic_auth_key,
                'Content-Type'  => 'application/x-www-form-urlencoded',
            ],
            $postKey  => $this->getTokenFields($code),
        ]);

        return json_decode($response->getBody(), true);
    }

    //token parse用の関数
    protected function parseAccessToken($body)
    {
        return json_decode($body, true);
    }

    
    //必須項目追加　grant_type
    protected function getTokenFields($code)
    {
        return [
            'code'         => $code,
            'redirect_uri' => $this->redirectUrl,
            'grant_type'   => 'authorization_code',
        ];
    }
}