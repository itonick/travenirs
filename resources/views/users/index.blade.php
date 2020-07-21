<!--マイページ-->

@extends('layouts.app')

@section('content')

    {{ Auth::user()->name }}<br>
    {!! link_to_route('users.edit', 'プロフィール編集', [$user->id], ['class' => 'btn btn-light']) !!}

    <ul>
        <li>{!! link_to_route('users.posts', 'マイ投稿', [$user->id]) !!}</li>
        <li>{!! link_to_route('users.show', 'タイムライン', ['user' => $user->id]) !!}</li>
        <li>{!! link_to_route('users.favorites', 'お気に入り', [$user->id]) !!}</li>
        <li>{!! link_to_route('users.followings', 'フォロー', [$user->id]) !!}</li>
        <li>{!! link_to_route('users.followers', 'フォロワー', [$user->id]) !!}</li>
        <li>{!! link_to_route('users.questions', 'マイ質問', [$user->id]) !!}</li>
    </ul>
@endsection