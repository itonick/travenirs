@extends('layouts.app')

@section('content')
    
    <div class="container justify-content-center mt-5 col-md-10 offset-md-2">
        <div class="h2 mt-5 mb-3"> <img src="https://img.icons8.com/doodle/38/000000/help.png"/> {{ $question->title }}</div>
        <div class="row post_person col-md-10 mt-3 mb-3">
            <div class="profile_image offset-md-1">
                <img src="{{ $question->user->image }}" class="rounded-circle" width="80" height="80">
            </div>
            <div class="text-primary h2 offset-1">{{ $question->user->name }}</div>
            <small class="pull-right col-md-5 col-12 offset-md-2 text-right" style="float:right;">Written on：{{ $question->created_at->format('Y/m/d') }}</small>
        </div>
        <div class="question-detail col-md-10" style="font-size:1.2em;">{{ $question->content }}</div>
    </div>
    
    <div class="container justify-content-center mt-3 mb-3 col-md-10 offset-md-2">
        <div class="col-md-10" style="font-size:1.2em;">@include('answers.answers')</div>
    </div>

    <div class="container mb-7 col-md-10 offset-md-2">
        {!! Form::open(['route' => 'answers.confirm']) !!}
        
            {!! Form::hidden('question_id', $question->id) !!}
            <div class="form-group justify-content-center mb-7 col-md-10">
                {!! Form::textarea('answer', old('answer'), ['class' => 'form-control', 'placeholder' => '回答を記入してください']) !!}
            </div>
            {!! Form::submit('回答を確認する', ['class' => 'btn btn-success text-right offset-md-7']) !!}
            
        {!! Form::close() !!}
    </div>

@endsection