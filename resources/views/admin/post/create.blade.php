@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">ツイート / 作成</h2>

            <div class="admin_form">
                {!! Form::open( ['action' => 'PostController@store', 'class' => 'form-horizontal'] ) !!}
                {{ csrf_field() }}

                <div class="field">
                    <label class="label">タイトル</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('title'))
                            {!! Form::text('title', old('title'), ['class' => 'input is-danger is-hovered', 'placeholder' => 'タイトルを入力してください']) !!}
                        @else
                            {!! Form::text('title', old('title'), ['class' => 'input is-info is-hovered', 'placeholder' => 'タイトルを入力してください']) !!}
                        @endif
                        @if ($errors->has('title'))
                            <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                        @endif
                    </div>
                    @if ($errors->has('title'))
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">ハッシュタグ</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('hashtag'))
                            {!! Form::text('hashtag', old('hashtag'), ['class' => 'input is-danger is-hovered', 'placeholder' => 'ハッシュタグを入力してください']) !!}
                        @else
                            {!! Form::text('hashtag', old('hashtag'), ['class' => 'input is-info is-hovered', 'placeholder' => 'ハッシュタグを入力してください']) !!}
                        @endif
                        @if ($errors->has('hashtag'))
                            <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                        @endif
                    </div>
                    @if ($errors->has('hashtag'))
                        <p class="help is-danger">{{ $errors->first('hashtag') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">テキスト</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('text'))
                            {!! Form::textarea('text', old('text'), ['class' => 'textarea is-danger is-hovered',"placeholder"=>"テキストを入力してください"]) !!}
                        @else
                            {!! Form::textarea('text', old('text'), ['class' => 'textarea is-info is-hovered',"placeholder"=>"テキストを入力してください"]) !!}
                        @endif
                        @if ($errors->has('text'))
                            <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                        @endif
                    </div>
                    @if ($errors->has('text'))
                        <p class="help is-danger">{{ $errors->first('text') }}</p>
                    @endif
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <a class="button is-rounded is-info is-outlined" href="{{ action('PostController@index') }}">戻る</a>
                        {{Form::submit('投稿', ['class' => 'button is-rounded is-primary'])}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>



        </div>
    </main>

    <style>
        .columns_datetime .column{
            max-width: 70%;
        }
    </style>

@endsection