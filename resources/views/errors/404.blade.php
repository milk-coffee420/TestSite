@extends('layouts.error_base')

@section('title', '404 Not Found')

@section('subtitle', 'ページが見つかりません')

@section('message', '該当アドレスのページを見つける事ができませんでした。')
{{-- 該当アドレスのページを見つける事ができませんでした。 --}}

@section('detail', '要求されたリソースを見つけることができませんでした。 URLのタイプミス、もしくはページが移動または削除された可能性があります。 トップページに戻るか、もう一度検索してください。')

@section('link')
    <a class="button is-primary is-focused error_link_btn is-medium" href="{{ url('/') }}">トップページに戻る</a>

@endsection