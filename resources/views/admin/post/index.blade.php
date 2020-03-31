@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">お知らせ管理</h2>
            <div class="admin_link_btn">
                <a href="{{ action('PostController@create') }}" class="button is-primary is-hovered is-rounded">新規作成</a>
            </div>
            <div class="admin_list_table">

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>操作</th>
                        <th>タイトル</th>
                        <th>ハッシュタグ</th>
                        <th>テキスト</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>
                                <a href="/admin/news/{{$item->id}}/edit" class="button is-small">編集</a>
                                <a class="button is-small is-light" id="open{{$item->id}}">削除</a>
                                <div class="modal" id="modal{{$item->id}}">
                                    <div class="modal-background"></div>
                                    <div class="modal-card">
                                        <div class="modal-card-head">
                                            <p class="modal-card-title">
                                                <small>ID: {{$item->id}}</small>
                                            </p>
                                            <button class="delete" aria-label="close" id="close{{$item->id}}"></button>
                                        </div>
                                        <div class="modal-card-body">
                                            <p>{{$item->text}}</p>
                                        </div>
                                        <div class="modal-card-foot">
                                            このレコードを削除してもよろしいですか？<br>
                                            削除すると復元はできません。
                                            <div class="modal_card_foot_content">
                                                {!! Form::model($item, ['action' => ['PostController@destroy', $item->id]]) !!}
                                                {{ csrf_field() }}
                                                {{Form::submit('削除', ['class' => 'button is-primary'])}}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#open{{$item->id}}").on("click", function() {
                                            $("div#modal{{$item->id}}").addClass("is-active");
                                        });

                                        $("#close{{$item->id}}, div.modal-background").on("click", function() {
                                            $("div#modal{{$item->id}}").removeClass("is-active");
                                        });
                                    });
                                </script>
                            </td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->hashtag}}</td>
                            <td class="admin_list_text"><div class="admin_wordwrap">{{$item->text}}</div></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>
    <style>

    </style>

@endsection