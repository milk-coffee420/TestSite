<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TitleStatusTest extends TestCase
{

    /**
     * 実行方法
     * vendor/bin/phpunit Tests/Feature/TitleStatusTest
     *
     * 目的
     * ①routeで定義されたrouteNameが正常にアクセスできるかどうか → testLaravelWebRoute
     *     →routeは自動取得
     * ②googleスプレッドシートのrouteNameに正常にアクセスできるかどうか → testRouteName
     *     →コピペして！（シートからrouteName.txtへ）
     * ③きちんとリダイレクトされているかの確認 → testRedirect
     *     →googleスプレッドシートから旧URLを集めてきてコピペして！（redirectFrom.txtへ）
     *
     */



    /*
     * 除外設定
     */
    private $easy_route_exclude = [
        '47.html',
        '11.html',
        '71.html',
        '7.html',
        '63.html',
        '8.html',
        '107.html',
        '9.html',
        '/cn',
        '/pg',
        '/api/user',
        '/edit',
        '/reset',
        '/delete',
        '/update',
        '/insert',
        '/login',
        '/logout',
    ];

    /**
     * routes/web.php で定義されたroute nameへアクセスできるか確認する。
     *
     * @return void
     */
    public function testLaravelWebRoute()
    {
//        ini_set('memory_limit', '2048M');

        $this->withoutExceptionHandling();
        $check_uri = [];
//        $check_method = ['GET', 'POST'];
        $check_method = ['GET'];
        $routes = \Route::getRoutes()->getRoutesByMethod();

        foreach ($check_method as $method) {
            foreach ($routes[$method] as $v) {
                $uri = $v->uri();
                if ($uri === '/') {
                    continue;
//                    $check_uri[$method][] = $uri;
                } else {
                    $uri = '/' . $uri;
                }
                $check = true;

                foreach ($this->easy_route_exclude as $c) {
                    if (strpos($uri, $c) !== false) {
                        $check = false;
                    }
                }

                if ($check === true) {
                    $check_uri[$method][] = $uri;
                }
            }
        }
        //トップページを追加
        $check_uri[$method][] = '/';

        foreach ($check_uri as $method => $uris) {
            foreach ($uris as $uri) {
                if ($method === 'POST') {
                } else {
//                    $response = $this->actingAs(self::$user)->get($uri);
                    try{
                        $response = $this->get($uri);
                        $response->assertStatus(200);
                    }catch (\Exception $e){
                        $this->assertFalse($e->getMessage());
                    }
                }
            }
        }
    }

    /**
     * routeNameへアクセスできるか確認する。
     * googleスプレッド「サイトマップ」のroute.php用シートからA列をコピーしてrouteName.txtへ貼り付け。
     *
     */
    public function testRouteName()
    {
        //googleスプレッドからのrouteNameを取得
        $path = resource_path('test/routeName.txt');
        $routeName = preg_replace('/\n(\s|\n)*\n/u',"\n",\File::get($path));
        $data = explode( "\n", $routeName );
        $cnt = count($data);

        //laravel routeからrouteNameの一覧を取得
        $arrRoute = null;
        $routes = \Route::getRoutes();
        foreach($routes as $r){
            if($r->getName()) {
                $arrRoute[] = $r->getName();
            }
        }

        $arrDiff = array_diff($arrRoute, $data);
        if(count($arrDiff) > 0){
            $msg = '';
            foreach($arrDiff as $a){
                $msg .= $a . " ";
            }
            $this->assertFalse("件数が異なる: " . $msg);
        }

        for( $i=0;$i<$cnt;$i++ )
        {
            //先頭と最終行に空行があったりするのでトリム
            if(trim($data[$i])) {
                try {
                    $response = $this->get(route($data[$i]));
                    $response->assertStatus(200);
                    //タイトル確認
                    $response->assertSee($meta = \App\SiteData::getMetaData($data[$i])[1]);
                    //desc確認
                    $response->assertSee($meta = \App\SiteData::getMetaData($data[$i])[2]);
                    //keyword確認
                    $response->assertSee($meta = \App\SiteData::getMetaData($data[$i])[3]);
                } catch (\Exception $e) {
                    $this->assertFalse($e->getMessage());
                }
            }
        }

    }

    /**
     * リダイレクトの確認
     * googleスプレッドから旧URLを集めてくる。redirectFrom.txtへ貼りつける
     * 
     */
    public function testRidirect()
    {
        $path = resource_path('test/redirectFrom.txt');
        $oldUrl = preg_replace('/\n(\s|\n)*\n/u',"\n",\File::get($path));
        $data = explode( "\n", $oldUrl );
        $cnt = count($data);

        for( $i=0;$i<$cnt;$i++ )
        {
            //先頭と最終行に空行があったりするのでトリム
            if(trim($data[$i])) {
                try {
                    $response = $this->get($data[$i]);
                    $response->assertStatus(302);
                } catch (\Exception $e) {
                    $this->assertFalse($e->getMessage());
                }
            }
        }
    }
}
