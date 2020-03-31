@extends('layouts.app_admin')

@section('content')
    <main class="admin">
        <div class="content-wrap admin_content">
            <h1>管理画面</h1>
            <div class="row justify-content-center">
                <h2 class="card-header">パスワードのリセット</h2>
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}" class="admin-form">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            パスワードリセットのリンクを送信
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="{{ route('login') }}">→ 戻る</a>
                </div>
            </div>
        </div>
    </main>
@endsection
