@extends('layouts.master')

@section('content')

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="{{URL::to('/uploads')}}/{{$news->mainImgpath}}" alt="Card image">

    <div class="card-img-overlay" style="  justify-content: center;">

      <br />

    </div>
  </div>
  <div class="container" style="min-height:400px">
    <div class="row">

        <div class="col-lg-9">
          <br />
          <h1 class="card-title greencolor">{{$news->title}}<br /></h1>
            <!-- Date/Time -->
            <p class=""><i class="fa fa-clock-o" aria-hidden="true"></i>
              {{$news->created_at->diffForHumans()}}</p>

            <hr>

            <!-- Post Content -->
            {!! $news->textarea !!}

            <br />
            <p class=""><i class="fa fa-clock-o" aria-hidden="true"></i>
            {{$news->created_at->toFormattedDateString()}}</p>
          </div>
        </div>
      </div>
</div>


@endsection('content')
