<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/line-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/nivo-lightbox.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/animate.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/css/main.css')}}">    
        <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css')}}">
    </head>
    <body>
        <div>
            @include('frontend.layouts.navigation')           

            <!-- Page Content -->
            @yield('content')

            @include('frontend.layouts.footer')
        </div>
    </body>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('frontend/js/jquery-min.js') }}" ></script>
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('frontend/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>    
    <script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>    
    <script src="{{ asset('frontend/js/jquery.nav.js') }}"></script>    
    <script src="{{ asset('frontend/js/scrolling-nav.js') }}"></script>    
    <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>    
    <script src="{{ asset('frontend/js/smoothscroll.js') }}"></script>    
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>     
    <script src="{{ asset('frontend/js/wow.js') }}"></script>   
    <script src="{{ asset('frontend/js/jquery.vide.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>    
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>    
    <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>    
    <script src="{{ asset('frontend/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('frontend/js/contact-form-script.js') }}"></script>   
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</html>
