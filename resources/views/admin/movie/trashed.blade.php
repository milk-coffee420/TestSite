@extends('admin.parts.app_admin')

@section('content')

<main class="admin">
    <div class="admin_content">
        <h2 class="admin_pagetitle subtitle">動画管理 / ごみ箱</h2>
        <div class="admin_list_table">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>操作</th>
                    <th>公開日時</th>
                    <th>公開終了日時</th>
                    <th>タイトル</th>
                    <th>Youtube ID</th>
                    <th>概要</th>
                    <th>記事内容</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        <a class="button is-small" onclick="event.preventDefault();document.getElementById('restore_form{{$item->id}}').submit();">復元</a>
                        <a class="button is-small is-light" id="open{{$item->id}}">削除</a>
                        {!! Form::model($item, ['action' => ['MovieController@restore', $item->id], 'id' => 'restore_form'.$item->id]) !!}
                        {{ csrf_field() }}
                        {!! Form::close() !!}
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
                                        {!! Form::model($item, ['action' => ['MovieController@forceDelete', $item->id]]) !!}
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
                    <td>{{ date('Y/m/d H:i', strtotime($item->publish_at)) }}</td>
                    <td>{{ date('Y/m/d H:i', strtotime($item->finished_at)) }}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->youtube_id}}</td>
                    <td class="admin_list_text"><div class="admin_wordwrap">{{$item->summary}}</div></td>
                    <td class="admin_list_text text_l"><div class="admin_wordwrap">{{$item->text}}</div></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a class="button is-rounded is-info is-outlined admin_return_btn" href="{{ action('MovieController@index') }}">戻る</a>

    </div>
</main>
<style>

</style>

@endsection