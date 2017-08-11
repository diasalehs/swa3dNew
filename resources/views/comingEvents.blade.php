@extends('layouts.master')

@section('content')


<div class="container min" style="margin:30px auto; padding:5px;">


    <div class="row">
      <h1 class="pinkcolor col-md-12 col-sm-12">Upcoming Events</h1>

         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">

          @foreach($events as $event)
          <div class="col-md-6 col-sm-12">
       <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h4 class="card-title line-clamp-2">{{$event->title}}</h4>
                  <div class="card-bottom">
                    <p class="card-text "><small>{{$event->startDate}} To {{$event->endDate}} - in Nablus</small></p>
                    <a href='event/{{$event->id}} ' class="btn btn-green" >View</a>
                    <a href="{{route('login')}}" class="btn btn-pink">Volunteer</a>

                  </div>

                </div>
              </div>
            </div>

            @endforeach

              </div>

         </div>

    </div>
    <div class="row justify-content-center" style="margin-top:40px;">

    {{$events->links('vendor.pagination.custom')}}

  </div>

</div>
@endsection('content')
