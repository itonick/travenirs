@extends('layouts.app')

@section('content')
    <div class="container col-md-10 mb-5" style="margin-top:70px;">
        <h2>お気に入りリスト</h2>
    </div>
    
    <div class="container col-md-10 mb-5 offset-md-2" style="margin-top:70px;">
        <div class="row">
            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <div class="col-md-3 col-5 ml-md-3 mr-3 mb-3">
                        <a href="{{ action('PostsController@show', $post->id) }}"><img class="mb-3" src="{{ asset('public/images/' . $post->image) }}"  width="150" height="150"></a>
                        <div class="row mt-3 mb-2">
                            <p class="h5">【{!! nl2br(e(Str::limit($post->title, 10))) !!}】</p>
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
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection