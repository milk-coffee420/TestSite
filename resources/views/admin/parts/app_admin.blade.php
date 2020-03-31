@php
    $page_name = \Route::current()->getName() ? \Route::current()->getName() : '';
    $meta = \App\SiteData::getMetaData($page_name);
    $title = isset($meta[1])?$meta[1]:'';
    $description = isset($meta[2])?$meta[2]:'';
    $keyword = isset($meta[3])?$meta[3]:'';
@endphp
<!DOCTYPE html>
<html lang="ja">

<head>
    @include('admin.parts.head')

</head>

<body class="admin_body" ontouchstart="">

<header class="admin_header pc">
    <div class="content">
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        管理画面
                    </h1>
                    <h3 class="subtitle">
                        Admin Settings
                    </h3>
                </div>
            </div>
            <div class="hero-foot">
                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul class="hero_menu">
                            <li><a href="{{ action('NewsController@index') }}" class="my-tooltip" title="お知らせ管理"><i class="fas fa-newspaper"></i>News</a></li>
                            <li><a href="{{ action('MovieController@index') }}" class="my-tooltip" title="動画管理"><i class="fas fa-film"></i>Movie</a></li>
                            <li><a href="{{route('admin.profile')}}" class="my-tooltip" title="管理者情報"><i class="fas fa-user"></i>User</a></li>
                            <li><a href="{{route('home')}}" class="my-tooltip" title="ホームに戻る"><i class="fas fa-home"></i>Home</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="my-tooltip" title="ログアウト"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                            </form>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="admin_header_sp sp">
    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
    </a>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
            <a href="{{ action('NewsController@index') }}" class="navbar-item">
                News
                <small>お知らせ管理</small>
            </a>
            <a href="{{ action('MovieController@index') }}" class="navbar-item">
                Movie
                <small>動画管理</small>
            </a>
            <a href="{{route('admin.profile')}}" class="navbar-item">
                User
                <small>管理者情報</small>
            </a>
            <a href="{{route('home')}}" class="navbar-item">
                Home
                <small>ホームに戻る</small>
            </a>
            <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault();document.getElementById('logout-form_sp').submit();">
                Logout
                <small>ログアウト</small>
            </a>
            <form id="logout-form_sp" action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
            </form>
        </div>
            
    </div>
</div>


<article id="main-contents">

    @yield('content')

</article>

<p id="pagetop_btn"><a href=""><i class="fas fa-arrow-up"></i></a></p>

</body>
</html>

<script>


</script>