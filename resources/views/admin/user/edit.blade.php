@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">管理者情報 / 編集</h2>

            {!! Form::model($item, ['action' => ['Auth\UserController@update', $item->id]]) !!}
                {{ csrf_field() }}

                {{--@if (count($errors) > 0)--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li class="admin_error">{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}

                {{Form::hidden('_method', 'PATCH')}}
                <div class="admin_profile">
                    <table class="table is-fullwidth">

                    <tr>
                        <th style="vertical-align: middle;">名前</th>
                        <td>
                            <div class="control has-icons-left has-icons-right">
                                @if ($errors->has('name'))
                                    {!! Form::input('text','name',$item->name, ['class' => 'input is-danger is-hovered', 'placeholder' => 'Name']) !!}
                                @else
                                    {!! Form::input('text','name',$item->name, ['class' => 'input is-info is-hovered', 'placeholder' => 'Name']) !!}
                                @endif
                                <span class="icon is-small is-left">
                                  <i class="fas fa-user"></i>
                                </span>
                                @if ($errors->has('name'))
                                    <span class="icon is-small is-right">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </span>
                                @endif
                            </div>
                            @if ($errors->has('name'))
                                <p class="help is-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <div class="control has-icons-left has-icons-right">
                                @if ($errors->has('email'))
                                    {!! Form::email('email', $item->email, ['class' => 'input is-danger is-hovered', 'placeholder' => 'Email']) !!}
                                @else
                                    {!! Form::email('email', $item->email, ['class' => 'input is-info is-hovered', 'placeholder' => 'Email']) !!}
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
                        </td>
                    </tr>
                    </table>
                </div>

                <div class="user_edit_btn is-grouped">
                    <div class="control">
                        <a class="button is-rounded is-info is-outlined" href="{{ action('Auth\UserController@getProfile') }}">戻る</a>
                        {{Form::submit('投稿', ['class' => 'button is-rounded is-primary'])}}
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </main>
<style>

</style>
@endsection