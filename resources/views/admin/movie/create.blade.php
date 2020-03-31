@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">動画管理 / 作成</h2>

            <div class="admin_form">
                {!! Form::open( ['action' => 'MovieController@store', 'class' => 'form-horizontal'] ) !!}
                {{ csrf_field() }}

                <div class="field">
                    <label class="label">公開日時</label>
                    <div class="columns columns_datetime">
                        <div class="column">
                            <div class="control has-icons-right">
                                @if ($errors->has('published_date'))
                                    {!! Form::date('published_date', (old('published_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                @else
                                    {!! Form::date('published_date', (old('published_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-info is-hovered']) !!}
                                @endif
                                @if ($errors->has('published_date'))
                                    <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                @endif
                            </div>
                            @if ($errors->has('published_date'))
                                <p class="help is-danger">{{ $errors->first('published_date') }}</p>
                            @endif
                        </div>
                        <div class="column">
                            <div class="control has-icons-right">
                                @if ($errors->has('published_time'))
                                    {!! Form::time('published_time', (old('published_time', '00:00')), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                @else
                                    {!! Form::time('published_time', (old('published_time', '00:00')), ['required', 'class' => 'input is-info is-hovered']) !!}
                                @endif
                                @if ($errors->has('published_time'))
                                    <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                @endif
                            </div>
                            @if ($errors->has('published_time'))
                                <p class="help is-danger">{{ $errors->first('published_time') }}</p>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="field">
                    <label class="label">公開終了日時</label>
                    <div class="columns columns_datetime">
                        <div class="column">
                            <div class="control has-icons-right">
                                @if ($errors->has('deleted_date'))
                                    {!! Form::date('deleted_date', (old('deleted_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                @else
                                    {!! Form::date('finished_date', (old('deleted_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-info is-hovered']) !!}
                                @endif
                                @if ($errors->has('finished_date'))
                                    <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                @endif
                            </div>
                            @if ($errors->has('finished_date'))
                                <p class="help is-danger">{{ $errors->first('finished_date') }}</p>
                            @endif
                        </div>
                        <div class="column">
                            <div class="control has-icons-right">
                                @if ($errors->has('finished_time'))
                                    {!! Form::time('finished_time', (old('finished_time', '00:00')), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                @else
                                    {!! Form::time('finished_time', (old('finished_time', '00:00')), ['required', 'class' => 'input is-info is-hovered']) !!}
                                @endif
                                @if ($errors->has('finished_time'))
                                    <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                @endif
                            </div>
                            @if ($errors->has('finished_time'))
                                <p class="help is-danger">{{ $errors->first('finished_time') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

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
                    <label class="label">Youtube ID</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('youtube_id'))
                            {!! Form::text('youtube_id', old('youtube_id'), ['class' => 'input is-danger is-hovered', 'placeholder' => 'YoutubeのIDを入力してください']) !!}
                        @else
                            {!! Form::text('youtube_id', old('youtube_id'), ['class' => 'input is-info is-hovered', 'placeholder' => 'YoutubeのIDを入力してください']) !!}
                        @endif
                        @if ($errors->has('youtube_id'))
                            <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                        @endif
                    </div>
                    @if ($errors->has('youtube_id'))
                        <p class="help is-danger">{{ $errors->first('youtube_id') }}</p>
                    @endif
                </div>

                <div class="field">
                    <label class="label">概要</label>
                    <div class="control has-icons-right">
                        @if ($errors->has('summary'))
                            {!! Form::textarea('summary', old('summary'), ['class' => 'textarea is-danger is-hovered',"placeholder"=>"概要を入力してください",'size' => '50x3']) !!}
                        @else
                            {!! Form::textarea('summary', old('summary'), ['class' => 'textarea is-info is-hovered',"placeholder"=>"概要を入力してください",'size' => '50x3']) !!}
                        @endif
                        @if ($errors->has('summary'))
                            <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                        @endif
                    </div>
                    @if ($errors->has('summary'))
                        <p class="help is-danger">{{ $errors->first('summary') }}</p>
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
                        <a class="button is-rounded is-info is-outlined" href="{{ action('MovieController@index') }}">戻る</a>
                        {{Form::submit('投稿', ['class' => 'button is-rounded is-primary'])}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            {{--@if (count($errors) > 0)--}}
            {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
            {{--<li class="admin_error">{{ $error }}</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}


        </div>
    </main>

    <style>
        .columns_datetime .column{
            max-width: 70%;
        }
    </style>

@endsection