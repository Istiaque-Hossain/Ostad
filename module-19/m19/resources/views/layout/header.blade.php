<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trips &mdash; Website Template by Colorlib</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ url('assets/fonts/icomoon/style.css') }}" />

    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/jquery.fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/fonts/flaticon/font/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/aos.css') }}" />

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}" />
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="site-wrap" id="home-section">
        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <header class="site-navbar site-navbar-target" role="banner">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-12">
                        <div class="site-logo text-center">
                            <a href="index.html" class="font-weight-bold">
                                <img src="{{ url('assets/images/logo.png') }}" alt="Image" class="img-fluid" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
