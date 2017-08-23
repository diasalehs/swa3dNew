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
  @if ($errors->first())

  <div class="modal fade " id="errormodal" style="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" style="   background-color: rgba(204, 49, 49, 0.8);
width: 93%; max-width:98%;
height: 94%;
padding: 0;" role="document">
      <div class="modal-content" style="   background-color: rgba(204, 49, 49, 0.6);
min-height: 100%;
border-radius: 0;
">

        <div class="modal-body error-body" >

                <div class="box" id="bluebox"style="width:100%"><!-- flex item -->

                  <div class="inner cover " style="width:100%">
                    <h1 class="fa fa-exclamation-circle"style="text-align:center;display:block;font-size:200px;color:rgba(255, 255, 255, .7);" aria-hidden="true" ></h1>

                            <h1 class="cover-heading" style="text-align:center;color:rgba(255, 255, 255, .7);">
                              Error <i class="fa fa-exclamation" aria-hidden="true"></i></h1>
                              @foreach ($errors->all() as $error)

                              <p class="lead" style="text-align:center;color:rgba(255, 255, 255, .7);    margin-bottom: 120px;">
                                {{$errors->first()}}
                              </p>
                              @endforeach

                            <div class="row justify-content-center" style=" ">
                              <div class="col-sm-12 col-md-3 error-btn-div">
                                <a href="{{route('goBack')}}" class="btn btn-lg btn-block  error-btn btn-secondary">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;&nbsp;   Go Back</a>
                              </div>
                              <div class="col-sm-12 col-md-3">
                                <a href="{{route('main')}}" class="btn btn-lg btn-block error-btn btn-secondary">
                                <i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;   Go Home</a>
                              </div>
                            </div>

                    </div>
                  </div>

        </div>

      </div>
    </div>
  </div>
  @endif



    @include('includes.header')
    <div class="main-cont" style="margin-top:78px">


        @yield('content')
    </div>

  @include('includes.footer')
