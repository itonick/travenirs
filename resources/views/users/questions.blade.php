<!--マイ質問-->

@extends('layouts.app')

@section('content')
    <div class="container col-md-10 mb-5" style="margin-top:70px;">
        <h2>マイ質問リスト</h2>
    </div>
    
    <div class="container col-md-10 mb-5 offset-md-2" style="margin-top:70px;">
        <div class="row">
            @if (count($questions) > 0)
                @foreach ($questions as $question)
                    <div class="question container justify-content-center mb-7 col-md-10 border-bottom">
                        <a href="{{ action('QuestionsController@show', $question->id) }}" class="question-hover">
                            <mark>{{ $question->category }}</mark>
                            <div class="h2 mt-1 mb-3"> <img src="https://img.icons8.com/doodle/38/000000/help.png"/> {{ $question->title }}</div>
                            <div class="row post_person col-md-10 mt-3 mb-3">
                                <small class="pull-right  col-5 offset-md-2 text-right" style="float:right;">Written on：{{ $question->created_at->format('Y/m/d') }}</small>
                            </div>
                            <div class="question-content col-md-10 mb-4" style="font-size:1.2em;">{{ $question->content }}</div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection