<!--マイ投稿-->

@extends('layouts.app')

@section('content')
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div>{{ Auth::user()->name }}</div>
            <div>
                <p class="mb-0">{!! nl2br(e($post->title)) !!}</p>
            </div>
            <div>
                <img class="rounded-circle" src="$post->image" width="50" height="50">
                
                @if(Auth::id() == $post->user_id)
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        @endforeach
    @endif
@endsection