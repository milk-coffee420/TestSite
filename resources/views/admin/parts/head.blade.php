<meta charset="UTF-8">
<title>@isset($title){{ $title }}@endisset</title>

<meta name="description" content="@isset($description){{ $description }}@endisset">
<meta name="keywords" content="@isset($keyword){{ $keyword }}@endisset">
<meta name="viewport" content="width=device-width" id="viewport">

<link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css') }}">
<link rel="stylesheet" href="{{ url('https://use.fontawesome.com/releases/v5.0.8/css/all.css') }}">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/css/tooltip.css') }}">

@include('layouts/parts/js')


<style>
    .admin_header .content .hero{
        background: linear-gradient(to right, rgba(127, 127, 213, 0.3), rgba(134, 168, 231, 0.3), rgba(145, 234, 228, 0.3)), url("{{ asset('/images/admin/admin_header.jpg') }}");
        background: -webkit-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/demo_header.jpg') }}");
        background: -moz-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/demo_header.jpg') }}");
        background: -ms-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/demo_header.jpg') }}");
        background-repeat: round;
    }

</style>