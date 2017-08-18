@extends('layouts.master')
@section('title')
  Swa3ed - {{$news->title}}

@endsection
@section('content')

<div class="news">
  <div class="card card-inverse">
    <img class="card-img cover-photo-high" src="{{URL::to('/uploads')}}/{{$news->mainImgpath}}" alt="Card image">

    <div class="card-img-overlay" style="background-color:rgba(19, 58, 83, 0.3);  justify-content: center;">

      <br />

    </div>
  </div>
  <div class="container" style="min-height:400px">
    <div class="row">

        <div class="col-md-9 col-sm-12">
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
          <div class="col-md-3">

          </div>
        </div>
      </div>
</div>


@endsection('content')
