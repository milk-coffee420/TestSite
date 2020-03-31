<head>
    <meta charset="UTF-8">
    <title>@isset($title){{ $title }}@endisset</title>
    <meta name="description" content="@isset($description){{ $description }}@endisset">
    <meta name="keywords" content="@isset($keyword){{ $keyword }}@endisset">
    <meta name="viewport" content="width=device-width" id="viewport">

    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    {{--  Google Tag Manager  --}}
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WS9PM4M');</script>
    {{--  End Google Tag Manager  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/tooltip.css') }}">

    @yield('link')
</head>