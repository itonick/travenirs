<!--投稿する-->

@extends('layouts.app')

@section('content')

    <h1>新規投稿ページ</h1>

    <div class="row">
        {!! Form::model($post, ['route' => 'posts.store', ' files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('image', '画像(3枚まで！)') !!}
                {!! Form::file('item_url[]', ['multiple' => 'multiple']) !!}
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
                {!! Form::text('tag', old('tag'), ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection