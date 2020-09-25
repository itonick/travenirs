@extends('layouts.app')

@section('content')
    <div class="container col-md-10 mb-5" style="margin-top:70px;">
        <h2>フォローリスト</h2>
    </div>
    
    <div class="container justify-content-center mt-5 mb-7 col-12 col-md-10 offset-md-2">
        @if (count($users) > 0)
            @foreach ($users as $user)
                <div class="row media-body col-12 col-md-12 border-bottom">
                    <div class="profile_image">
                        <img src="{{ $user->image }}" class="rounded-circle" width="80" height="80">
                    </div>
                    <a href="{{ action('UsersController@show', $user->id) }}" class="col-8 col-md-7"><p class="text-primary col-12 h2 mt-3">{{ $user->name }}</p></a>
                    <div class="post_button mb-5 mt-3 col-12 col-md-3" style="margin-left:auto;">
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
                </div>
            @endforeach
        @endif
    </div>
@endsection