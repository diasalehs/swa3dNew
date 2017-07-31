@extends('institute/layouts.profilemaster')

@section('content')

<div class="news">
  <div class="card card-inverse">

  
    <img class="card-img" src="{{$news->mainImgpath}}" alt="Card image">

    <div class="card-img-overlay">
      <h1 class="card-title">{{$news->title}}</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-lg-9">

            <hr>

            <!-- Date/Time -->
            <p class="news-date"> Posted on {{$news->created_at}}</p>

            <hr>

            <!-- Post Content -->
            <p class="news-text"> <?php  echo"".$news->textarea ;?> </p>
            

            <hr>

          </div>
        </div>
      </div>
</div>


@endsection('content')
