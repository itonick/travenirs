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
                <div class="container col-12 offset-1 offset-md-2 post_list mb-5" style="margin-top:70px;">
                    <div class="row post_person">
                        <div class="profile_image col-3">
                            <img src="{{ $post->user->image }}" class="rounded-circle" width="80" height="80">
                        </div>
                        <p class="text-primary col-2 h2">{{ $post->user->name }}</p>
                        <small class="col-4">Written on：{{ $post->created_at->format('Y/m/d') }}</small>
                    </div>
                    <div class="row col-10 col-md-8">
                        <img src="/storage/images/{{ $post->image }}" style="width:100%;height:auto;">
                    </div>
                    <div class="row mt-3 mb-2">
                        <p class="">タイトル：{{ $post->title }}</p>
                        <div class="post_button">
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
                    <div class="grad-wrap post_content row text-center justify-content-center">
                        <input id="trigger{{ $post->id }}" class="grad-trigger" type="checkbox">
                        <div class="grad-item">{{ $post->content }}</div>
                        <label class="grad-btn btn btn-outline-info btn-sm" for="trigger{{ $post->id }}"></label>
                    </div>
                </div>
            @endforeach
            </section>
        @endif
    </div>
    
    {{ $posts->links() }}
@endsection
