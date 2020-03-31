@extends('layouts.error_base')

@section('title', '400 Bad Request')

@section('subtitle', 'リクエストにエラーがあります')

@section('message', '何らかの原因でこのリクエストは無効です。')

@section('detail', 'このレスポンスは、パス情報の書式が正しくない、パラメータまたはリクエストの本文値の書式が正しくない、必要なパラメータが足りない、または値の書式は正しいが何らかの原因で無効です。')