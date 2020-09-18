<!--投稿編集-->

@extends('layouts.app')

@section('content')
    <div class="container col-md-10 mb-5" style="margin-top:70px;">
        <h2>投稿編集</h2>
    </div>
    
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center">
            <div class="col-6">
                {!! Form::model($post, ['route' => ['posts.update', $post->id], 'enctype'=>'multipart/form-data', 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('image', 'プロフィール写真') !!}
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('title', 'タイトル:') !!}
                        {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', '内容:') !!}
                        {!! Form::text('content', $post->content, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('tag', 'タグ') !!}
                        {!! Form::text('tag', $post->tag, ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
    
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
