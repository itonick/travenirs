<!--マイページ-->

@extends('layouts.app')

@section('content')
    <div class="container col-12 col-md-10 mt-5">
        <div class="row">
            <div class="profile_image col-3">
                <img src="{{ asset('storage/image/' .$user->image) }}" class="rounded-circle" width="80" height="80">
            </div>
            <div class="profile_name_edit col-9 col-md-8">
                <p>{{ Auth::user()->name }}</p>
                <p>{!! link_to_route('users.edit', 'プロフィール編集', [$user->id], ['class' => 'btn btn-light']) !!}</p>
            </div>
        </div>
    </div>
    
    <div class="container mt-5">
        <div class="row">
            <div class="row mypage_menu col-12">
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.posts', 'マイ投稿', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.show', 'タイムライン', ['user' => $user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.favorites', 'お気に入り', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.followings', 'フォロー', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.followers', 'フォロワー', [$user->id]) !!}</div>
                <div class="btn btn-warning border d-flex align-items-center justify-content-center rounded-circle col-md-3 col-5 offset-1 mb-3" style="height:100px; width:50px;">{!! link_to_route('users.questions', 'マイ質問', [$user->id]) !!}</button>
            </div>
        </div>
    </div>
@endsection