@php
    $page_name = \Route::current()->getName() ? \Route::current()->getName() : '';
    $meta = \App\SiteData::getMetaData($page_name);
    $title = isset($meta[1])?$meta[1]:'';
    $description = isset($meta[2])?$meta[2]:'';
    $keyword = isset($meta[3])?$meta[3]:'';
@endphp
        <!DOCTYPE html>
<html lang="ja">
@include('layouts.parts.head')

<body>

{{--  Google Tag Manager (noscript)  --}}
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WS9PM4M"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
{{--  End Google Tag Manager (noscript)  --}}


@include('layouts.parts.header')


<article class="main-contents">

    @yield('content')

</article>

@include('layouts.parts.footer')


@include('layouts.parts.js')
{{--  target="_blank"は参照先でjs操作される恐れがあるのでリファラーを送らない  --}}
<script>
    $(function() {
        $("[target='_blank']").attr('rel', 'noopener noreferrer');
    });
</script>

</body>
</html>