<!-- Meta Tag -->
@yield('meta')
<!-- Title Tag  -->
<title>@yield('title') - Smart Phone Store</title>
@php
    $settings = DB::table('settings')->get();
    $logo = '';
    foreach ($settings as $data) {
     $logo = $data->phone;
    }

@endphp

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='copyright' content=''>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
<meta name="title" content="@yield('title', 'Smart Phone Store') - Smart Phone Store">
<meta name="description" content="@yield('meta_desc', 'Free Shipping Within Europe Monthly promotions Best deals Free returns Return for up to 30 days Secure payments Security guarantee The new Airstrait Dyson Airstrait New […]')">
<meta name="image" content="@yield('meta_image', $logo)">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:type" content="article">
<meta property="og:image" content="@yield('meta_image', $logo)">
<meta property="og:title" content="@yield('title', 'Smart Phone Store') - Smart Phone Store">
<meta property="og:description" content="@yield('meta_desc', 'Free Shipping Within Europe Monthly promotions Best deals Free returns Return for up to 30 days Secure payments Security guarantee The new Airstrait Dyson Airstrait New […]')">

<!-- Favicon -->
<link rel="icon" type="image/png" href="images/favicon.png">
<!-- Web Font -->
<link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet">

<!-- StyleSheet -->
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
<!-- Magnific Popup -->
<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.css') }}">
<!-- Fancybox -->
<link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
<!-- Themify Icons -->
<link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
<!-- Nice Select CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/niceselect.css') }}">
<!-- Animate CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
<!-- Flex Slider CSS -->
<link rel="stylesheet" href="{{ asset('frontend/css/flex-slider.min.css') }}">
<!-- Owl Carousel -->
<link rel="stylesheet" href="{{ asset('frontend/css/owl-carousel.css') }}">
<!-- Slicknav -->
<link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}">
<!-- Jquery Ui -->
<link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">

<!-- Eshop StyleSheet -->
<link rel="stylesheet" href="{{ asset('frontend/css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

<style>
    /* Multilevel dropdown */
    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>a:after {
        content: "\f0da";
        float: right;
        border: none;
        font-family: 'FontAwesome';
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0px;
        margin-left: 0px;
    }

    /*
</style>
@stack('styles')
