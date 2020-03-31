@extends('admin.parts.app_admin')

@section('content')

    <main class="admin">
        <div class="admin_content">
            <h2 class="admin_pagetitle subtitle">管理者情報</h2>


            <div class="admin_profile">
                <table class="table is-fullwidth">
                    <tbody>
                    <tr>
                        <th>名前</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="field is-grouped">
                    <div class="control">
                        <a class="button is-rounded is-info is-outlined" href="{{ action('NewsController@index') }}">戻る</a>
                        <a class="button is-rounded is-primary" href="/admin/{{ Auth::user()->id }}/edit" type="submit">編集</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

<style>

</style>
@endsection