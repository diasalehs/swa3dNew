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
                  <a href="{{route('login')}}" class="card-link pink-link">Volunteer</a>
                  <a href="{{route('login')}}" class="card-link yellow-link ">Follow</a>
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
                  @if($user->userType != 1)
                  <?php $flag = 0; ?>
                    @foreach($volEvents as $volEvent)
                      @if($volEvent->individual_id == $user->individuals->id && $event->id == $volEvent->event_id && $flag == 0)
                          <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                          <?php $flag = 1; ?>
                      @endif
                    @endforeach
                    @if($flag == 0)
                      <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                    @endif
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
            <h1 class="pinkcolor col-md-8 col-sm-12">vents matches your intrests</h1>

          @foreach($localevents as $event)
          
            @foreach($userevent as $eve)
              @if($event->id == $eve->event_id)
               <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
                  <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                  @if($user->userType != 1)
                  <?php $flag = 0; ?>
                    @foreach($volEvents as $volEvent)
                      @if($volEvent->event_id == $event->id)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                        <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        <?php $flag = 1; ?>
                      @elseif($flag == 0)
                        <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                        <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        <?php $flag = 1; ?>
                      @endif
                    @endforeach
                    @if($flag == 0)
                      <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                    @endif
                  @endif
                </div>
              </div>
           </div>
              @endif

            @endforeach
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
                  @if($user->userType != 1)
                  <?php $flag = 0; ?>
                    @foreach($volEvents as $volEvent)
                      @if($volEvent->individual_id == $user->individuals->id && $event->id == $volEvent->event_id && $flag == 0)
                          <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                          <?php $flag = 1; ?>
                      @endif
                    @endforeach
                    @if($flag == 0)
                      <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                    @endif
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
