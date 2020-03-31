@extends('layouts.error_base')

@section('title', '401 Unauthorized')

@section('subtitle', '認証に失敗しました。
')

@section('message', '認証に失敗しました。')

@section('detail', 'リクエストされたリソースを得るためには認証が必要です。')
