@extends('layouts.app')

@section('content')
    <div class="container col-12 col-md-10 mt-5">
        <div class="row">
            <div class="profile_image col-4 text-center">
                <img src="{{ asset(Auth::user()->image) }}" class="rounded-circle" width="100" height="100">
            </div>
            
            <div class="profile_name_edit col-8 col-md-8">
                <p class="text-primary col-12 h2">{{ Auth::user()->name }}</p>
                <p>{!! link_to_route('users.edit', 'プロフィール編集', [$user->id], ['class' => 'btn btn-info']) !!}</p>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="row mypage_menu col-12">
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.posts', 'マイ投稿', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.questions', 'マイ質問', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-4 offset-md-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.favorites', 'お気に入り', [$user->id]) !!}</div>
            </div>
            <div class="row mypage_menu col-12">
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 offset-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.followings', 'フォロー', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 offset-md-1 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.followers', 'フォロワー', [$user->id]) !!}</div>
            </div>
        </div>
    </div>
@endsection