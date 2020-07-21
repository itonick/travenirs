<!--質問する-->

@extends('layouts.app')

@section('content')

    <h1>質問ページ</h1>

    <div class="row">
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
                {!! Form::radio('category', '観光', ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection
