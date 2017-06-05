<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href=" {{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('vendor/css/styles.css')}}" rel="stylesheet">
    @yield('styles')
    <!-- Temporary navbar container fix -->
  <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    /* Temporary fix for img-fluid sizing within the carousel */
    
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }
    </style>

</head>

<body>
    @include('includes.header')
    <div class="main">
        @yield('content')
    </div>
    @include('includes.footer')