@extends('layouts.app')

@section('content')

    <div class="container col-md-10 mb-3" style="margin-top:70px;">
        <div class="row post_person col-12">
            <div class="profile_image col-md-3 col-2 text-center">
                <img src="{{ $user->image }}" class="rounded-circle" width="80" height="80">
            </div>
            <ul class="post-user-info" style="list-style-type:none;">
                <li><a href="{{ action('UsersController@show', $user->id) }}"><p class="text-primary col-12 h2">{{ $user->name }}</p></a>
                
                    <div class="post_button">
                    @if (Auth::id() != $user->id)
                        @if (Auth::user()->is_following($user->id))
                            {!! Form::open(['route' => ['user.unfollow', $user->id], 'method' => 'delete']) !!}
                                {!! Form::submit('フォロー中', ['class' => "btn btn-danger btn-block"]) !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['route' => ['user.follow', $user->id]]) !!}
                                {!! Form::submit('フォロー', ['class' => "btn btn-primary btn-block"]) !!}
                            {!! Form::close() !!}
                        @endif
                    @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="container col-md-10 mb-5 offset-md-2" style="margin-top:70px;">
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col-md-3 col-5 ml-md-3 mr-3 mb-3" style="display:inline-block">
                        <a href="{{ action('PostsController@show', $post->id) }}"><img class="mb-3" src="{{ asset('public/images/' . $post->image) }}"  width="150" height="150"></a>
                        <p class="mb-0">【{!! nl2br(e(Str::limit($post->title, 10))) !!}】</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
@endsection