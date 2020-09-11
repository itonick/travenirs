<!DOCTYPE html>
<html lang="jp">
    <head>
        <title>Travenirs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        
        <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">
        <link rel="stylesheet" href="/css/jquery-ui.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="/css/animate.css">    
        
        <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
        <link rel="stylesheet" href="/css/aos.css">
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/infinite-scroll.pkgd.min.js') }}"></script>
        <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

    </head>
    <body>
        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>
        
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/main.js"></script>

        <script src="{{mix('js/app.js')}}"></script>
        <script src="https://unpkg.com/vue-infinite-loading@^2/dist/vue-infinite-loading.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    </body>
</html>