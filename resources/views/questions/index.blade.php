@extends('layouts.app')

@section('content')

    <div class="container">
    	<div class="row justify-content-center mt-5 mb-3">
            <div class="col-md-6">
                <div id="custom-search-input">
                    <form action="{{ route('questions.search') }}" method="get">
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
    
    @if (count($questions) > 0)
        @foreach ($questions as $question)
            <div class="question container justify-content-center mt-5 mb-7 col-md-10 offset-md-2 border-bottom">
                <a href="{{ action('QuestionsController@show', $question->id) }}" class="question-hover">
                    <mark>{{ $question->category }}</mark>
                    <div class="h2 mt-1 mb-3"> <img src="https://img.icons8.com/doodle/38/000000/help.png"/> {{ $question->title }}</div>
                    <div class="row post_person col-md-10 mt-3 mb-3">
                        <div class="profile_image offset-md-1">
                            <img src="{{ $question->user->image }}" class="rounded-circle" width="80" height="80">
                        </div>
                        <div class="text-primary h2 offset-1">{{ $question->user->name }}</div>
                        <small class="pull-right col-5 offset-md-2 text-right" style="float:right;">Written on：{{ $question->created_at->format('Y/m/d') }}</small>
                    </div>
                    <div class="question-content col-md-10 mb-4" style="font-size:1.2em;">{{ $question->content }}</div>
                    回答数：{{ $question->answers->count() }}
                </a>
            </div>
            @if($loop->last)
                <p class="text-center mt-4">ーーこれ以上質問はありませんーー</p>
            @endif
        @endforeach
    @endif

@endsection
