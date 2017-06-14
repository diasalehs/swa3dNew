@extends('layouts.master')

@section('content')

<div class="container-fluid" style="margin:30px auto">
    <div class="row">
         <div class="col-12" style="color: #333">
          <h1 class="pinkcolor">UpComing Events</h1>
          <div class="row">

          @foreach($events as $event)
              <div class="col-6 ">
                <div class="card" style="">
                  <img class="card-img-top" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="card-title">{{$event->title}}</h4>
                    <p class="card-text">{{$event->description}}</p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$event->startDate}}</li>
                    <li class="list-group-item">{{$event->endDate}}</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                  </ul>
                  <div class="card-block">
                    <a href='event/".$event->id."' class="card-link">View Event</a>
                  </div>
                </div>
              </div>
            @endforeach
              </div>

         </div>

    </div>
</div>

@endsection('content')
