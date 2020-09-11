<!--質問する-->

@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            {!! Form::model($question, ['route' => 'questions.store']) !!}
                
                <div class="form-group">
                    {!! Form::label('title', '質問タイトル:') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '質問内容:') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('category', 'カテゴリー:') !!}
                    <div class="form-check form-check-inline">
                        {{ Form::radio('category', '観光', true, ['id' => 'radio-one', 'class' => 'form-check-input']) }}
                        {{ Form::label('radio-one', '観光', ['class' => 'form-check-label']) }}
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::radio('category', '食事', false, ['id' => 'radio-two', 'class' => 'form-check-input']) }}
                        {{ Form::label('radio-two', '食事', ['class' => 'form-check-label']) }}
                    </div>
                    <div class="form-check form-check-inline">
                        {{ Form::radio('category', 'その他', false, ['id' => 'radio-three', 'class' => 'form-check-input']) }}
                        {{ Form::label('radio-three', 'その他', ['class' => 'form-check-label']) }}
                    </div>
                </div>
    
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
