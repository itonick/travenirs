@extends('layouts.app')

@section('content')

@if (Auth::check())
  {{ Auth::user()->name }}
@else
  <div class="site-wrap">
   
    <div class="slide-one-item home-slider owl-carousel">
      
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
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="">
            <div class="text-center">
              <span class="flaticon-money-bag-with-dollar-symbol display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Increase Revenue</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="100">
            <div class="text-center">
              <span class="flaticon-bar-chart display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Analytics</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right" data-aos="fade-up" data-aos-delay="200">
            <div class="text-center">
              <span class="flaticon-medal display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">3 Years Experience</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="text-center">
              <span class="flaticon-box display-4 d-block mb-3 text-primary"></span>
              <h3 class="text-uppercase h4 mb-3">Free Package</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
            </div>
          </div>
          <ul>
            <li>{!! link_to_route('travenirs.create', '投稿する', [], ['class' => 'btn btn-primary']) !!}</li>
            <li>{!! link_to_route('travenirs.create', '投稿一覧', [], ['class' => 'btn btn-primary']) !!}</li>
          </ul>
        </div>
      </div>
    </div>
  
      
    <div class="site-half">
      <div class="img-bg-1" style="background-image: url('images/img_4.jpg');" data-aos="fade"></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-lg-5 ml-lg-auto py-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
            <h2 class="site-section-heading text-uppercase font-secondary mb-5">Clean Design</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus aliquid eius facilis voluptatem eligendi magnam accusamus vel commodi asperiores sint rem reprehenderit nobis nesciunt veniam qui fugit doloremque numquam quod.</p>
  
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tempora distinctio ipsam nesciunt recusandae repellendus asperiores amet.</p>  
          </div>
        </div>
      </div>
    </div>
  
    <div class="site-half block">
      <div class="img-bg-1 right" style="background-image: url('images/img_5.jpg');" data-aos="fade"></div>
      <div class="container">
        <div class="row no-gutters align-items-stretch">
          <div class="col-lg-5 mr-lg-auto py-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Easy To Use Templates</span>
            <h2 class="site-section-heading text-uppercase font-secondary mb-5">Free HTML5 Templates</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus aliquid eius facilis voluptatem eligendi magnam accusamus vel commodi asperiores sint rem reprehenderit nobis nesciunt veniam qui fugit doloremque numquam quod.</p>
  
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tempora distinctio ipsam nesciunt recusandae repellendus asperiores amet.</p>  
          </div>
        </div>
      </div>
    </div>
  
    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">Try For Your Next Project</h2>
            <a href="#" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Contact Us</a>
          </div>
        </div>
      </div>
    </div>
  
    <footer class="site-footer bg-dark">
      <div class="container">
        
  
        <div class="row">
          <div class="col-md-4 mb-4 mb-md-0">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet.</p>
            <p><a href="#" class="btn btn-primary text-white px-4">Read More</a></p>
          </div>
          <div class="col-md-5 mb-4 mb-md-0 ml-auto">
            <div class="row mb-4">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contacts</a></li>
                    <li><a href="#">Privacy</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Free Templates</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">HTML5 / CSS3</a></li>
                    <li><a href="#">Clean Design</a></li>
                    <li><a href="#">Responsive</a></li>
                    <li><a href="#">Multi Purpose Template</a></li>
                  </ul>
              </div>
            </div>
  
            <div class="row mb-5">
              <div class="col-md-12">
              <h3 class="footer-heading mb-4 text-white">Stay up to date</h3>
              <form action="#" class="d-flex footer-subscribe">
                <input type="text" class="form-control rounded-0" placeholder="Enter your email">
                <input type="submit" class="btn btn-primary rounded-0" value="Subscribe">
              </form>
            </div>
            </div>
          </div>
  
          
          <div class="col-md-2">
            
            <div class="row">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>
  
                </p>
              </div>
          </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
  
            
          </div>
          
        </div>
      </div>
    </footer>
  </div>
@endif

@endsection