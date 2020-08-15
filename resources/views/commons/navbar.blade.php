<!--<div class="site-mobile-menu">-->
<!--  <div class="site-mobile-menu-header">-->
<!--    <div class="site-mobile-menu-close mt-3">-->
<!--      <span class="icon-close2 js-menu-toggle"></span>-->
<!--    </div>-->
<!--  </div>-->
<!--  <div class="site-mobile-menu-body"></div>-->
<!--</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap js-site-navbar">
    
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light"> 
            <div class="site-navbar bg-light">
                <div class="row align-items-center">
                    <div class="col-2">
                        <h2 class="mb-0 site-logo"><a href="/" class="font-weight-bold text-uppercase">Travenirs</a></h2>
                    </div>
                    <div class="col-10">
                        <nav class="site-navigation text-right" role="navigation">
                            <div class="container">
                                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
            
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                
                                <div class="collapse navbar-collapse row justify-content-end" id="nav-bar">
                                    <ul class="navbar-nav site-menu js-clone-nav d-lg-block">
                                        @if (Auth::check())
                                            <li class="nav-item">{!! link_to_route('users.index', 'マイページ', ['user' => Auth::id()]) !!}</li>
                                            <li class="nav-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                                        @else
                                            <li class="nav-item">{!! link_to_route('signup.get', 'サインアップ', [], ['class' => 'nav-link']) !!}</li>
                                            <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>