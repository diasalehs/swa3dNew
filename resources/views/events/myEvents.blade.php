@extends('layouts.master')
 @section('content')

<div class="container" style="margin:20px auto; min-height:500px">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist" style="margin-bottom:30px;margin-top:40px;">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active"  href="{{route('myEvents')}}" >Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " href="{{route('archiveMyEvents')}}" >My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link " href="{{route('makeEvent')}}" >Create Event</a>
  </li>
</ul>



          <h1 class="greencolor">My Up Coming Events</h1>
          <div class="row">
            @foreach ($Uevents as $event)

            <div class="col-md-6 col-sm-12">
         <div class="card card-inverse event">
                  <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                  <div class="card-img-overlay">
                    <h4 class="card-title line-clamp-2">{{$event->title}}</h4>
                    <div class="card-bottom">
                      <p class="card-text "><small>{{$event->startDate}} To {{$event->endDate}} - in Nablus</small></p>
                      <p class="card-text">
                        <small>
                          Volunteer Requests: <span class="badge badge-pill badge-default tags">21</span>
                        </small>
                      </p>
                      <a href="{{route('event',$event->id)}}" class="btn btn-green" >View</a>
                      <a class="btn btn-pink" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                      <a class=" btn btn-yellow" href="{{route('eventEdit',[$event->id])}}">Edit</a>

                    </div>

                  </div>
                </div>
              </div>
              @endforeach

          </div>

</div>

@endsection
