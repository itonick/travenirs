@extends('layouts.app')

@section('content')

    <h1>投稿一覧</h1>

    @if (count($posts) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ユーザーネーム</th>
                    <th>タイトル</th>
                    <th>写真</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->image }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
