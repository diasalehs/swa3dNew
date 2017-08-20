<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/pp/favicon.ico" type="image/x-icon">
    <link rel="icon" href="{{ URL::to('/') }}/pp/favicon.ico" type="image/x-icon">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href=" {{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Custom styles for this template -->
    <link href="{{ URL::asset('vendor/css/styles.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/messenger.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/news.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/research.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/profileView.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/footer.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/jstarbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/jquery.tag-editor.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/dataTables.checkboxes.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('vendor/css/bootstrap-datepicker.standalone.min.css')}}" rel="stylesheet">

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
    <div class="main-cont" style="margin-top:78px">
        @yield('content')
    </div>

  @include('includes.footer')
