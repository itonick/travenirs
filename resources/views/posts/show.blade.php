<!--特定ユーザー投稿詳細-->

@extends('layouts.app')

@section('content')

    <div class="post_list container col-md-10 mb-5" style="margin-top:70px;">
        <div class="row post_person col-12">
            <div class="profile_image">
                <img src="{{ $post->user->image }}" class="rounded-circle" width="80" height="80">
            </div>
            <ul class="post-user-info" style="list-style-type:none;">
                <li><a href="{{ action('UsersController@show', $post->user->id) }}"><p class="text-primary col-2 h2">{{ $post->user->name }}</p></a>
                
                    <div class="post_button">
                    @if (Auth::id() != $post->user->id)
                        @if (Auth::user()->is_following($post->user->id))
                            {!! Form::open(['route' => ['user.unfollow', $post->user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('フォロー中', ['class' => "btn btn-danger btn-block"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => ['user.follow', $post->user->id]]) !!}
                                {!! Form::submit('フォロー', ['class' => "btn btn-primary btn-block"]) !!}
                            {!! Form::close() !!}
                        @endif
                    @endif
                    </div>
                </li>
            </ul>
            <small class="col-12 text-md-right mb-2">Written on：{{ $post->created_at->format('Y/m/d') }}</small>
        </div>
        
        <div class="col-12 col-md-12">
            <img src="/storage/images/{{ $post->image }}" style="width:100%;height:auto;">
        </div>
        
        <div class="row mt-3 mb-2 col-12">
            <p class="h5">【{{ $post->title }}】</p>
            <div class="post_button offset-3" style="margin-left:auto;">
                @if (Auth::user()->is_favorite($post->id))
                    {!! Form::open(['route' => ['favorites.unfavorite', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('★', ['class' => "btn btn-success btn-sm"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['favorites.favorite', $post->id]]) !!}
                        {!! Form::submit('☆', ['class' => "btn btn-primary btn-sm"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
        
        <div class="row col-12 col-md-11 justify-content-center">
            <div class="h3 col-12 col-md-10 text-center mb-2">{{ $post->content }}</div>
        </div>
    </div>
    
@endsection