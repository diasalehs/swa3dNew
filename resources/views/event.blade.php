@extends('layouts.master')

@section('content')

<?php
if($flag){
echo "hhhhhhhhhhhhhhhhhhhhhhhhh";
}
  ?>

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="https://dummyimage.com/600x400/000/fff" alt="Card image">

    <div class="card-img-overlay">
      <h1 class="card-title">{{$event->title}}</h1>
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
