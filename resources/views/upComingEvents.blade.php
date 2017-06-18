@extends('layouts.master')

@section('content')

@if(Auth::guest())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
            <h1 class="pinkcolor col-md-8 col-sm-12">UpComing Events</h1>

          @foreach($events as $event)
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                  <a href='event/{{$event->id}}' class="card-link pink-link">Volunteer</a>
                  <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                </div>
              </div>
            </div>

            @endforeach
              </div>
              {{$events->links()}}

         </div>

    </div>
</div>
@endif

@if(Auth::check())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
            <h1 class="pinkcolor col-md-8 col-sm-12">Events in your counrty</h1>

          @foreach($localevents as $event)
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
                  <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                  @if(Auth::user()->userType!=1)
                  <a href='event/{{$event->id}}' class="card-link pink-link">Volunteer</a>
                  <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                  @endif
                </div>
              </div>
            </div>

            @endforeach
              </div>
         </div>
              <br>
           <form action="{{route('allLocal')}}" method="GET"><button>view more</button></form>

    </div>
<br><br>
<div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
            <h1 class="pinkcolor col-md-8 col-sm-12">Events all over</h1>

          @foreach($events as $event)
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                  @if(Auth::user()->userType!=1)
                  <a href='event/{{$event->id}}' class="card-link pink-link">Volunteer</a>
                  <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                  @endif

                </div>
              </div>
            </div>

            @endforeach
              </div>
              <br>
           <form action="{{route('allEvents')}}" method="GET"><button>view more</button></form>

         </div>


    </div>
</div>

@endif

@endsection('content')
