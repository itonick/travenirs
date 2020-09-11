<!--マイ投稿-->

@extends('layouts.app')

@section('content')
    <div class="container col-md-10 mb-5" style="margin-top:70px;>
        <h2>マイ投稿リスト</h2>
    </div>
    
    <div class="container col-md-10 mb-5 offset-md-2" style="margin-top:70px;">
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col-md-3 col-5 ml-md-3 mr-3 mb-3" style="display:inline-block">
                        <a href="{{ action('PostsController@show', $post->id) }}"><img class="mb-3" src="/storage/images/{{ $post->image }}"  width="150" height="150"></a>
                        <p class="mb-0">【{!! nl2br(e($post->title)) !!}】</p>
                        @if(Auth::id() == $post->user_id)
                            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection