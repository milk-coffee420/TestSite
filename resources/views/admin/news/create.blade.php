@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">お知らせ / 作成</h2>

            <div class="admin_form">
                {!! Form::open( ['action' => 'NewsController@store', 'class' => 'form-horizontal'] ) !!}
                    {{ csrf_field() }}

                    <div class="field">
                        <label class="label">公開日時</label>
                        <div class="columns columns_datetime">
                            <div class="column">
                                <div class="control has-icons-right">
                                    @if ($errors->has('publish_date'))
                                        {!! Form::date('publish_date', (old('publish_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                    @else
                                        {!! Form::date('publish_date', (old('publish_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-info is-hovered']) !!}
                                    @endif
                                    @if ($errors->has('publish_date'))
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @endif
                                </div>
                                @if ($errors->has('publish_date'))
                                    <p class="help is-danger">{{ $errors->first('publish_date') }}</p>
                                @endif
                            </div>
                            <div class="column">
                                <div class="control has-icons-right">
                                    @if ($errors->has('publish_time'))
                                        {!! Form::time('publish_time', (old('publish_time', '00:00')), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                    @else
                                        {!! Form::time('publish_time', (old('publish_time', '00:00')), ['required', 'class' => 'input is-info is-hovered']) !!}
                                    @endif
                                    @if ($errors->has('publish_time'))
                                        <span class="icon is-small is-right">
                                            <i class="fas fa-exclamation-triangle"></i>
                                        </span>
                                    @endif
                                </div>
                                @if ($errors->has('publish_time'))
                                    <p class="help is-danger">{{ $errors->first('publish_time') }}</p>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="field">
                        <label class="label">公開終了日時</label>
                        <div class="columns columns_datetime">
                            <div class="column">
                                <div class="control has-icons-right">
                                    @if ($errors->has('publish_date'))
                                        {!! Form::date('finished_date', (old('finished_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-danger is-hovered']) !!}
                                    @else
                                        {!! Form::date('finished_date', (old('finished_date', Carbon\Carbon::now()->format('Y-m-d'))), ['required', 'class' => 'input is-info is-hovered']) !!}
                                    @endif
                                    @if ($errors->has('publish_date'))
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
                        <label class="label">記事内容</label>
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
                            <a class="button is-rounded is-info is-outlined" href="{{ action('NewsController@index') }}">戻る</a>
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