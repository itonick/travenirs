<!--マイ質問-->

@extends('layouts.app')

@section('content')
    @if (count($questions) > 0)
        @foreach ($questions as $question)
            <div>{{ Auth::user()->name }}</div>
            <div>
                <p>{!! nl2br(e($question->title)) !!}</p>
                <p>{!! nl2br(e($question->content)) !!}</p>
                <span class="text-muted">投稿日：{{ $question->created_at }}</span>
            </div>
        @endforeach
    @endif
@endsection