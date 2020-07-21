<!--投稿編集-->

@extends('layouts.app')

@section('content')

    <h1>id: {{ $message->id }} のメッセージ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('image', '画像') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '内容:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tag', 'タグ') !!}
                    {!! Form::text('tag', old('tag'), ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection



<!--{{-- メッセージ編集ページへのリンク --}}-->
<!--{!! link_to_route('messages.edit', 'このメッセージを編集', ['message' => $message->id], ['class' => 'btn btn-light']) !!}-->