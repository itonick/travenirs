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
        <div class="row mb-5">
          <div class="col-md-12 text-center" data-aos="fade"> 
            <h2 class="site-section-heading text-uppercase text-center font-secondary">みんなの投稿</h2>
          </div>
        </div>
        <div class="row border-responsive">
          <div class="col-12 mb-4 mb-lg-0 text-center" data-aos="fade-up" data-aos-delay="">
            <div class="text-center">
              <span class="flaticon-money-bag-with-dollar-symbol display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Increase Revenue</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
            </div>
          </div>

            <div class="row col-12 mx-auto">
                <p class="row col-md-6 justify-content-center mx-auto">{!! link_to_route('posts.create', '投稿する', [], ['class' => 'btn btn-outline-success btn-lg col-md-6 col-8']) !!}</p>
                <p class="row col-md-6 justify-content-center mx-auto">{!! link_to_route('posts.index', '投稿一覧', [], ['class' => 'btn btn-outline-success btn-lg col-md-6 col-8']) !!}</p>
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
            <p>初めての旅行でわからないこと、行ったことのない場所のこと、質問してみよう！</p>
            <p>実際に行ったことのある人が教えてくれるのが一番！</p>
            <h2 class="row justify-content-end mr-1">{!! link_to_route('questions.index', '質問一覧', [], ['class' => 'btn btn-success']) !!}</h2>
          </div>
        </div>
      </div>
    </div>
  
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h4 class="text-uppercase text-white mb-4" data-aos="fade-up">Instagramでも「＃travenirs」をつけて<br>旅行の魅力を投稿しよう！</h4>
            <a href="#" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  
    <footer class="site-footer bg-dark">
        <div class="container">
        <div class="row">
            <p class="row col-12 mt-4 justify-content-end">{!! link_to_route('posts.create', '投稿する', [], ['class' => 'btn btn-outline-success']) !!}</p>
            <p class="row col-12 justify-content-end">{!! link_to_route('questions.create', '質問する', [], ['class' => 'btn btn-outline-success']) !!}</p>
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