<!--投稿する-->

@extends('layouts.app')

@section('content')

    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            {!! Form::model($post, ['route' => 'posts.store', 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
    
                <div class="form-group">
                    <p>{!! Form::label('image', '写真:') !!}</p>
                    <p>{!! Form::file('image') !!}</p>
                </div>
                
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '内容:') !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tag', 'タグ') !!}
                    {!! Form::text('tag', old('tag'), ['class' => 'form-control', 'placeholder' => 'タグ検索用']) !!}
                </div>
    
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
    
            {!! Form::close() !!}
        </div>
    </div>
@endsection