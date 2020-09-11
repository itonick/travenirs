@extends('layouts.app')

@section('content')

    <div class="container justify-content-center mt-5 col-md-8 offset-md-2">
        <p class="h2">この内容で回答しますか？</p>
        <div class="answer-confirm border" style="font-size:1.2em;">
            {{ $answer }}
        </div>

    	<div class="text-center">
    	    <a href="javascript:history.back();">{!! Form::submit('書き直す', ['class' => 'btn btn-outline-secondary btn-lg']) !!}</a>
    	    <div style="display:inline-block;">
    	        {!! Form::open(['route' => 'answers.complete']) !!}
                    {!! Form::submit('回答する', ['class' => 'btn btn-success ml-5 btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        </div>
	</div>
    
@endsection