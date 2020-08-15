@extends('layouts.app')

@section('content')

    <h1>質問一覧</h1>

    @if (count($questions) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>質問タイトル</th>
                    <th>ユーザーネーム</th>
                    <th>質問内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->title }}</td>
                    <td>{{ $question->name }}</td>
                    <small>Written on {{ $question->created_at }}</small>
                    <td>{{ $question->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
