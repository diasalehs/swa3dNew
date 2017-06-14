@extends('layouts.master')

@section('content')

@if($flag)
hhhhhhhhhhhhhhhhhhhhhhhhh
@endif

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="https://dummyimage.com/600x400/000/fff" alt="Card image">

    <div class="card-img-overlay">
      <h1 class="card-title">{{$event->title}}</h1>
      <p class="card-text text-right"><div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>
</div></p>

    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-lg-9">

            <hr>

            <!-- Date/Time -->
            <p style="color:#777"> Posted on {{$event->created_at}}</p>

            <hr>

            <!-- Post Content -->
            <p class=""> <?php  echo"".$event->description ;?> </p>

            <hr>

          </div>
        </div>
      </div>
</div>

@endsection('content')
