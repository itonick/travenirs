@extends('layouts.app')

@section('content')
    
    <div class="container">
    	<div class="row justify-content-center mt-5 mb-3">
            <div class="col-md-6">
                <div id="custom-search-input">
                    <form action="{{ route('posts.search') }}" method="get">
                        <div class="input-group col-md-12">
                            {{ csrf_field() }}
                            <input type="text" class="form-control input-lg" name="search">
                            <span class="input-group-prepend">
                                <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
    	</div>
    </div>
    
    @isset($search_result)
        <h4 class="row justify-content-center">{{ $search_result }}</h4>
    @endisset

    <div class="post_index">
        @if (count($posts) > 0)
        <section class="scroll_area"
            data-infinite-scroll='{
                "path": ".pagination a[rel=next]",
                "append": ".post_list"
            }'
        >
            @foreach ($posts as $post)
                <div class="post_list container col-md-10 mb-5 border-bottom" style="margin-top:70px;">
                    <div class="row post_person col-md-10 col-12">
                        <div class="profile_image col-5 text-center">
                            <img src="{{ $post->user->image }}" class="rounded-circle border float-right" width="100" height="100">
                        </div>
                        <ul class="post-user-info" style="list-style-type:none;">
                            <li><a href="{{ action('UsersController@show', $post->user->id) }}"><p class="text-primary col-12 h1">{{ $post->user->name }}</p></a>
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
                    <div class="col-12 col-md-12 text-center">
                        <img class="border col-12 col-md-8" src="{{ asset('public/images/' . $post->image) }}">
                    </div>
                    <div class="row mt-3 mb-2 col-md-8 offset-md-2">
                        <p class="h5">【{{ $post->title }}】</p>
                        <div class="post_button offset-3 " style="margin-left:auto;">
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
                    <div class="grad-wrap post_content row col-12 col-md-12 justify-content-center mb-3">
                        <input id="trigger{{ $post->id }}" class="grad-trigger" type="checkbox">
                        <div class="grad-item col-12 col-md-10 text-center mb-2 ml-5">{{ $post->content }}</div>
                        <label class="grad-btn btn btn-lg btn-outline-info " for="trigger{{ $post->id }}"></label>
                    </div>
                </div>
            @endforeach
            </section>
        @endif
    </div>
    
    <a href="#" class="back-to-top"><i class="fas fa-plane-departure"></i>Top</a>
    
    <div style="display:none;">
        {{ $posts->links() }}
    </div>
@endsection
