@extends('layouts.master')

@section('content')

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">

    <div class="card-img-overlay">
      <h1 class="card-title">{{$event->title}}</h1>


    </div>
  </div>

  <div class="container">
    <div class="row" >

        <div class="col-lg-9">
          <hr>


            <!-- Post Content -->
            <p class=""> <?php  echo"".$event->description ;?> </p>

            <hr>

          </div>
          <div class="col-lg-3">
            <hr>

            @if($flag)
            <div class="btn-group" style="width:100%">
              <button type="button" class="btn btn-danger btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Delete</a>
                <a class="dropdown-item" href="#">Edit</a>

              </div>
            </div>
            @endif


          </div>
        </div>
      </div>
</div>

@endsection('content')
