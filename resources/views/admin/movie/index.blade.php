@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">動画管理</h2>
            <div class="admin_link_btn">
                <a href="{{ action('MovieController@create') }}" class="button is-primary is-hovered is-rounded">新規作成</a>
                <a href="{{ action('MovieController@getTrashed') }}" class="button is-rounded is-hovered is-primary is-light"><i class="fas fa-trash-alt"></i></a>
            </div>
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
                                <a href="/admin/movie/{{$item->id}}/edit" class="button is-small">編集</a>
                                <a class="button is-small is-light" onclick="event.preventDefault();document.getElementById('delete_form{{$item->id}}').submit();"><i class="fas fa-trash-alt"></i></a>
                                {!! Form::model($item, ['action' => ['MovieController@destroy', $item->id], 'id' => 'delete_form'.$item->id]) !!}
                                {{ csrf_field() }}
                                {!! Form::input('hidden', '_method', 'DELETE') !!}
                                {!! Form::close() !!}

                                <script>
                                    $(document).ready(function() {
                                        $("#open{{$item->id}}").on("click", function() {
                                            $("div.modal").addClass("is-active");
                                        });

                                        $("#close{{$item->id}}, div.modal-background").on("click", function() {
                                            $("div.modal").removeClass("is-active");
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

        </div>
    </main>
    <style>

    </style>

@endsection