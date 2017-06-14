@extends('layouts.master')

@section('content')

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="{{ URL::to('/') }}/pp/{{$user[0]->picture}}" alt="Card image">
    <div class="card-img-overlay">
      <h1 class="card-title">{{$user[0]->nameInEnglish}}</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-lg-9">

            <hr>

            <!-- Date/Time -->
            <p style="color:#777">Joined in:{{$user[0]->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <p class=""></p>

            <hr>

          </div>
        </div>
      </div>
</div>


@endsection('content')
