<header class="pc">
    <div class="content">
        <div class="hero">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        Lorem Ipsum
                    </h1>
                    <h3 class="subtitle">
                        demo site
                    </h3>
                </div>
            </div>
            <div class="hero-foot">
                <nav class="tabs is-boxed is-fullwidth">
                    <div class="container">
                        <ul class="hero_menu">
                            <li><a href="#sec1" class="my-tooltip" title="お知らせ"><i class="fas fa-newspaper"></i>News</a></li>
                            <li><a href="#sec1" class="my-tooltip" title="Youtube"><i class="fas fa-user"></i>Movie</a></li>
                            <li><a href="#sec1" class="my-tooltip" title="Something"><i class="fas fa-home"></i>Content</a></li>
                            <li><a href="#sec1" class="my-tooltip" title="お問い合わせ"><i class="fas fa-home"></i>Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="sp">
    <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
    </a>

    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
            <a href="{{ action('NewsController@index') }}" class="navbar-item">
                News
                <small>お知らせ</small>
            </a>
            <a href="{{route('admin.profile')}}" class="navbar-item">
                User
                <small>Youtube</small>
            </a>
            <a href="{{route('home')}}" class="navbar-item">
                Contact
                <small>お問い合わせ</small>
            </a>
        </div>

    </div>
</div>