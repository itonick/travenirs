<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap js-site-navbar bg-white">
      
  <div class="container">
    <div class="site-navbar bg-light">
      <div class="row align-items-center">
        <div class="col-2">
          <h2 class="mb-0 site-logo"><a href="index.html" class="font-weight-bold text-uppercase">Travenirs</a></h2>
        </div>
        <div class="col-10">
          <nav class="site-navigation text-right" role="navigation">
            <div class="container">
              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li>{!! link_to_route('signup.get', 'Sign Up', [], ['class' => 'nav-link']) !!}</li>
                <li><a href="contact.html"><span class="d-inline-block bg-primary text-white btn btn-primary">Log In</span></a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>