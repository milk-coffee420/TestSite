
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
<body class="admin_body">
<article id="main-contents">

    <main class="admin">
        <div class="content admin_content">

            <div class="card admin_login_card">
                <div class="card-header">
                    <h3 class="card-header-title">
                        ログイン
                    </h3>
                </div>
                <div class="card-content">
                    <div class="content">
                        {!! Form::open( ['route' => 'login', 'class' => 'form-horizontal'] ) !!}
                            {{ csrf_field() }}

                            <div class="field">
                                <label class="label">メールアドレス</label>
                                <div class="control has-icons-left has-icons-right">
                                    @if ($errors->has('email'))
                                        {!! Form::email('email', old('email'), ['class' => 'input is-danger is-hovered', 'placeholder' => 'Email']) !!}
                                    @else
                                        {!! Form::email('email', old('email'), ['class' => 'input is-info is-hovered', 'placeholder' => 'Email']) !!}
                                    @endif
                                    <span class="icon is-small is-left">
                                  <i class="fas fa-envelope"></i>
                                </span>
                                    @if ($errors->has('email'))
                                        <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @endif
                                </div>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <label class="label">パスワード</label>
                                <div class="control has-icons-left has-icons-right">
                                    @if ($errors->has('password'))
                                        {!! Form::input('password', 'password', old('password'), ['class' => 'input is-danger is-hovered', 'placeholder' => 'Password']) !!}
                                    @else
                                        {!! Form::input('password', 'password', old('password'), ['class' => 'input is-info is-hovered', 'placeholder' => 'Password']) !!}
                                    @endif
                                    <span class="icon is-small is-left">
                                  <i class="fas fa-lock"></i>
                                </span>
                                    @if ($errors->has('password'))
                                        <span class="icon is-small is-right">
                                      <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                    @endif
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="field">
                                <div class="control">
                                    <label class="checkbox">
                                        {{Form::checkbox('remember',(old('remember') ? 'checked' : ''))}}
                                        <small>以降メールアドレス、パスワードを自動入力</small>
                                    </label>
                                </div>
                            </div>

                            <div class="field is-grouped">
                                <div class="control">
                                    {{Form::submit('Sign in', ['class' => 'button is-rounded'])}}
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('home') }}" class="card-footer-item">ホームに戻る</a>
                </div>
            </div>

        </div>
    </main>

</article>


@include('layouts.parts.js')



</body>
</html>

<style>
    .admin_body{
        width: 100%;
        height: 100%;
        background-color: rgba(145, 234, 228, 0.2);
        background: linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/admin/login_bg.jpg') }}");
        background: -webkit-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/admin/login_bg.jpg') }}");
        background: -moz-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/admin/login_bg.jpg') }}");
        background: -ms-linear-gradient(to right, rgba(127, 127, 213, 0.2), rgba(134, 168, 231, 0.2), rgba(145, 234, 228, 0.2)), url("{{ asset('/images/admin/login_bg.jpg') }}");
        background-repeat: round;
    }


</style>

