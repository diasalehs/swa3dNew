@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
            <h1 class="pinkcolor ">UpComing Events You Joined in</h1>
            <hr>
            @if(count($acceptedEvents)==0)
                <h2 class="greencolor">
                  No events
                </h2>
            @endif
          @foreach($acceptedEvents as $event)

          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href="{{route('event',$event->id)}}" class="card-link green-link" >View</a>
                          <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                </div>
              </div>
            </div>
            @endforeach
              <br>

            <h1 class="pinkcolor ">UpComing Events You Request to Join</h1>
            <hr>
            @if(count($requestedEvents)==0)
                <h2 class="greencolor">
                  No events
                </h2>
            @endif
          @foreach($requestedEvents as $event)
          <div class="col-md-10 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href="{{route('event',$event->id)}}" class="card-link green-link" >View</a>
                          <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
              </div>
            </div>
            @endforeach
              </div>
              <br>

              <h1 class="pinkcolor ">Events You Invited To</h1>
            <hr>
            @if(count($invitedEvents)==0)
                <h2 class="greencolor">
                  No events
                </h2>
            @endif
          @foreach($invitedEvents as $event)
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href="{{route('event',$event->id)}}" class="card-link green-link" >View</a>
                          <a href="{{route('Volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                </div>
              </div>
            </div>
            @endforeach
              <br>

          </div>
      </div>
</div>

@endsection
