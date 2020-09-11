<!--プロフィール編集-->

@extends('layouts.app')

@section('content')

    <div class="container mt-5 col-md-10 col-12">
        <div class="row justify-content-center col-md-10 col-12 mb-5 offset-md-2" style="margin-top:70px;">
            <div class="col-md-10 col-12">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
    
                    <div class="form-group">
                        {!! Form::label('image', '画像') !!}
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('name', 'ユーザーネーム') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('emeil', 'メールアドレス') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
            
                    <div class="form-group">
                        {!! Form::label('password', 'パスワード') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>
    
                    <div class="form-group">
                        {!! Form::label('password_confirmation', '確認用パスワード') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('編集', ['class' => 'btn btn-primary']) !!}
    
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection



