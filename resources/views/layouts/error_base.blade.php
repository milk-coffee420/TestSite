<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        .error_link_btn{
            margin: 2rem 3rem;
        }

        .error_card{
            background-color: ghostwhite !important;
        }

        .card-content{
            margin: 2.5rem 0.5rem;
        }

        .card-header h2{
            line-height: 2.5em;
            margin-left: 1em;
            color: dimgray;
            font-size: 1.3rem;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>
<body>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-2">

            </div>
            <div class="column is-8">
                <div class="card error_card">
                    <header class="card-header">
                        <h2 class="card-header-title">@yield('title')</h2>
                    </header>
                    <div class="card-content">
                        <h1 class="title">@yield('subtitle')</h1>
                        <p class="subtitle">
                            @yield('message')
                        </p>
                        <p>
                            @yield('detail')
                        </p>
                    </div>
                    <footer class="card-footer">
                        @yield('link')
                    </footer>
                </div>
            </div>
            <div class="column is-2">

            </div>
        </div>

    </div>
</section>

</body>
</html>