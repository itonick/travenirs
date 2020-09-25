@extends('layouts.app')

@section('content')

    <div class="site-wrap">
   
        <div class="slide-one-item owl-carousel">
            <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/_117023-909.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6 text-center" data-aos="fade">
                            <h1 class="font-secondary  font-weight-bold text-uppercase">Share your travel</h1>
                        </div>
                    </div>
                </div>
            </div>  
      
            <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/_23-2148587065.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">
                            <h1 class="font-secondary font-weight-bold text-uppercase">question about trip</h1>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/_23-2148587064.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">
                            <h1 class="font-secondary font-weight-bold text-uppercase">have a good trip</h1>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
      
        <div class="slant-1"></div>
      
        <div class="site-section first-section">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-md-12 text-center" data-aos="fade"> 
                        <h2 class="site-section-heading text-uppercase text-center font-secondary">みんなの投稿</h2>
                    </div>
                </div>
            
                <div class="border-respomsove">
                    <div class="row justify-content-center text-center" style="list-style:none; margin:1rem 0 1rem 0; padding:0;">
                        @if (count($posts) > 0)
                            @foreach ($posts as $post)
                                <a href="{{ action('PostsController@show', $post->id) }}" class="col-md-10"><img class="border col-12 col-md-8" src="{{ asset('public/images/' . $post->image) }}"></a>
                                <div class="profile_image col-12 col-md-8 mt-4">
                                    <img src="{{ asset($post->user->image) }}" class="rounded-circle float-left ml-md-5 border" width="100" height="100">
                                    <a href="{{ action('UsersController@show', $post->user->id) }}"><div class="text-primary h2 col-md-10 offset-md-4 text-left">{{ $post->user->name }}</div></a>
                                    <div class="h4 col-md-10 offset-md-4 text-left">【{{ $post->title }}】</div>
                                </div>
                            @endforeach
                        @endif
                    </div>
        
                    <div class="row col-12 col-md-10 mx-auto">
                        <p class="row col-md-6 col-6 justify-content-center mx-auto">{!! link_to_route('posts.create', '投稿する', [], ['class' => 'btn btn-outline-success btn-lg col-md-5 col-12']) !!}</p>
                        <p class="row col-md-6 col-6 justify-content-center mx-auto">{!! link_to_route('posts.index', '投稿一覧', [], ['class' => 'btn btn-outline-success btn-lg col-md-5 col-12']) !!}</p>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="site-half">
            <div class="img-bg-1 border" style="background-image: url('images/_82574-6903.jpg');" data-aos="fade"></div>
            <div class="container">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-lg-5 ml-lg-auto py-5">
                        <span class="caption d-block mb-2 font-secondary font-weight-bold">Post Services</span>
                        <h2 class="site-section-heading text-uppercase font-secondary mb-5">{!! link_to_route('posts.create', '投稿する', [], ['class' => 'btn btn-success']) !!}</h2>
                        <p>ガイドブックには載っていないような発見,</p>
                        <p>みんなの旅のお土産話を聞かせて！</p>
                        <h2 class="row justify-content-end mr-1">{!! link_to_route('posts.index', '投稿一覧', [], ['class' => 'btn btn-success']) !!}</h2>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="site-half block">
            <div class="img-bg-1 right border" style="background-image: url('images/map_woman.jpg');" data-aos="fade"></div>
            <div class="container">
                <div class="row no-gutters align-items-stretch">
                    <div class="col-lg-5 mr-lg-auto py-5">
                        <span class="caption d-block mb-2 font-secondary font-weight-bold">Question Services</span>
                        <h2 class="site-section-heading text-uppercase font-secondary mb-5">{!! link_to_route('questions.create', '質問する', [], ['class' => 'btn btn-success']) !!}</h2>
                        <p>「初めての旅行でわからないこと」「行ったことのない場所のこと」など、なんでも質問してみよう！</p>
                        <p>実際に行ったことのある人が教えてくれるのが一番！</p>
                        <h2 class="row justify-content-end mr-1">{!! link_to_route('questions.index', '質問一覧', [], ['class' => 'btn btn-success']) !!}</h2>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="py-5 bg-primary">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="row col-12 text-center mb-3 mb-md-0 align-items-center justify-content-center">
                        <h4 class="text-uppercase text-white mb-4" data-aos="fade-up">Instagramでも「＃travenirs」をつけて<br>旅行の魅力を投稿しよう！</h4>
                    </div>
                    <div class="">
                        <ul class="col-12" style="list-style:none; float:left; flex-wrap: wrap;">
                        	<?php
                        	$num   = 8;
                        	$fb_api = 'https://graph.facebook.com/v8.0/';
                        	$insta_id = '17841438494093853'; 
                        	$token = 'EAAkiWvxZABZC8BAOfxsi4rZBgYbQxZBoYsTwwoq1rJnHs1lO0xWvvkc9vQhZBCFfSWaZCZC9tmF33rbI9GDKk1urnN20JJCni0ZBJ0lb04BlxGaD4TfZBEtTzeZB3wq5GsBEzTmfYxFw1LMMkO5MZCudq4e1SwwBs9NZCFP7IhndHCOZASmTuTVguUXNRRNMvRGWxatcZD';
                        	$query = 'media.limit('. $num. '){caption,like_count,media_url,permalink,timestamp}'; //何を取得するか
                        	$insta_json  = file_get_contents("{$fb_api}{$insta_id}?fields={$query}&access_token={$token}");
                        	$insta_data  = json_decode($insta_json);
                        	?>
                        	<?php
                        		foreach((array)$insta_data->media->data as $post){ ?>
                        		<li class="col-6 col-md-3 mb-3" style=" float:left; flex-wrap: wrap;"><a href="<?php echo $post->permalink; ?>" target="_blank"><img src="<?php echo $post->media_url; ?>" width="100%" height="150px" class=""></a></li>
                        	<?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      
        <footer class="site-footer bg-dark">
            <div class="container">
            <div class="row">
                <div class="col-3 mt-4" style="font-size:1.5em;"><a href="https://www.instagram.com/travenirs/?hl=ja" target="_blank" rel="noopener">Instagram : <i class="fab fa-instagram"></i></a></div>
                <div  style="margin-left:auto;">
                    <p class="row col-12 mt-4 justify-content-end">{!! link_to_route('posts.create', '投稿する', [], ['class' => 'btn btn-outline-success']) !!}</p>
                    <p class="row col-12 justify-content-end">{!! link_to_route('questions.create', '質問する', [], ['class' => 'btn btn-outline-success']) !!}</p>
                </div>
            </div>
            <div class="row mt-2 text-center">
                <div class="col-md-12">
                    <p>&copy; 2020 Travenirs</p>
                </div>
            </div>
            </div>
        </footer>
        
    </div>

@endsection