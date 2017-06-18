<?php 
use App\Individuals;
?>
@extends('layouts.master')

@section('content')

@if($event->endDate > $date)

@if(Auth::guest())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href="{{route('login')}}" class="card-link pink-link">Volunteer</a>
                  <a href="{{route('login')}}" class="card-link yellow-link ">Follow</a>
                </div>
              </div>
            </div>
              </div>

         </div>

    </div>
</div>
@endif

@if(Auth::check())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
                  @if($user->userType == 0)
                      @if($request)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                      @elseif(!$request)
                        <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      @endif
                      <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                  @elseif($mine)
                    <a class="card-link pink-link" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                    <a class="card-link yellow-link" href="{{route('eventVeiwEdit',[$event->id])}}">Edit</a>
                  @endif
                </div>
              </div>
            </div>
              </div>
         </div>
              <br>
    </div>
<br><br>

        @if($mine)

          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <thead class="text-center">
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($eventVols as $eventVol)
                <?php $individual = Individuals::where('id',$eventVol->individual_id)->first();?>
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$individual->user_id])}}">{{$individual->nameInEnglish}}</a>
                  </td>
                  <td>
                  <a class="btn btn-primary btn-sm" href="{{route('acceptVolunteer',['volunteerId'=>$individual->id , 'eventId' => $event->id])}}">Accept</a>
                  </td>
                </tr>
              @endforeach


            </tbody>
          </table>
          </div>
        @endif

        @if($event->open)
          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <h1>Volunteers</h1>
            <thead class="text-center">
              <tr>
                <th>Name</th>
                @if($mine)
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <?php $individual = Individuals::where('id',$eventAcceptedVol->individual_id)->first();?>
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$individual->user_id])}}">{{$individual->nameInEnglish}}</a>
                  </td>
                  @if($mine)
                  <td>
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$individual->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        @elseif(!$event->open)
          @if($eventCloseAllowed || $mine)
          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <h1>Volunteers</h1>
            <thead class="text-center">
              <tr>
                <th>Name</th>
                @if($mine)
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <?php $individual = Individuals::where('id',$eventAcceptedVol->individual_id)->first();?>
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$individual->user_id])}}">{{$individual->nameInEnglish}}</a>
                  </td>
                  @if($mine)
                  <td>
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$individual->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
          @endif
        @endif

        </div>
      </div>
</div>
@endif


@else


<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                </div>
              </div>
            </div>
              </div>

         </div>

    </div>
</div>
@if(Auth::check())
@if($event->open)
          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <h1>Volunteers</h1>
            <thead class="text-center">
              <tr>
                <th>Name</th>
                @if($mine)
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <?php $individual = Individuals::where('id',$eventAcceptedVol->individual_id)->first();?>
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$individual->user_id])}}">{{$individual->nameInEnglish}}</a>
                  </td>
                  @if($mine)
                  <td>
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$individual->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        @elseif(!$event->open)
          @if($eventCloseAllowed || $mine)
          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <h1>Volunteers</h1>
            <thead class="text-center">
              <tr>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <?php $individual = Individuals::where('id',$eventAcceptedVol->individual_id)->first();?>
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$individual->user_id])}}">{{$individual->nameInEnglish}}</a>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
          @endif
        @endif
@endif
@endif

@endsection('content')
