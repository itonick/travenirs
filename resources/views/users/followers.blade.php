<!--フォロワー-->

@extends('layouts.app')

@section('content')
    <!--<div class="row">-->
    <!--    <div class="col-sm-8">-->
            {{-- ユーザ一覧 --}}
            @include('users.users')
    <!--    </div>-->
    <!--</div>-->
@endsection