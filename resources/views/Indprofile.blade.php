@extends('layouts.master')

@section('content')

<div class="viewProfile">
  <div class="jumbotron jumbotron-fluid text-center" style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)),url({{ URL::to('/vendor/img/newlogo.png')}});
  background-size:contain; background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container">
      <div class=" circular--landscape">
          <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
      </div>

      <h1 class="display-7" style="color:#fff">{{$user->nameInEnglish}}</h1>
      <span>{{$user->acc_avg}}</span>
      @if($available)
        <span class="badge badge-success">Available</span>
      @elseif(!$available)
        <span class="badge badge-default">Not Available</span>
      @endif
      <p class="" style=" color:#fff"><span>Volunteer</span> <span>{{$user->country}}</span> <span>{{$user->cityName}}</span> </p>

      @if(Auth::guest())
             <a class='btn btn-green'  href="{{route('login')}}">follow</a>
      @else
        @if($friend)
             <a class='btn btn-green'  href="{{route('unfollow',$user->user_id)}}">unfollow</a>
        @elseif(!$friend)
             <a class='btn btn-green'  href="{{route('follow',$user->user_id)}}">follow</a>
        @endif
        @if($userUevents->count() > 0)
        <a class='btn btn-green'  data-toggle="modal" data-target="#invite">invite</a>
        @endif
        @if($mine)
          @if($open)
            <a class='btn btn-danger'  href="{{route('closeProfile')}}">close</a>
          @elseif(!$open)
            <a class='btn btn-danger'  href="{{route('openProfile')}}">open</a>
          @endif
        @endif
      @endif




    </div>
  </div>

    @if($open || $mine)
  <div class="container">
    <div class="row">

        <div class="col-lg-8">


                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">User Informations</h4>
                    <p class="card-text">
                    Gender: {{$user->gender}}<br>
                    Birth Date: {{$user->dateOfBirth}}<br>
                    Education: {{$user->educationalLevel}}<br>
                    Current Work: {{$user->currentWork}}<br>
                    Availabel from: {{$user->availableFrom}} to: {{$user->availableTo}}<br>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Contact Informations</h4>
                    <p class="card-text">
                    Email: {{$user->email}}<br>
                    Adress: {{$user->address}}<br>
                    Mobile number: {{$user->mobileNumber}}<br>
                    <a href="{{route('messenger',$user->email)}}" class="card-link green-link">Send Message</a>
                  </div>
                </div>
                <br>

                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Events Joined In</h4>
                    <p class="card-text">
                    @foreach($myevents as $event)
                      Event Title: <a href="{{route('event',$event->id)}}" >{{$event->title}}</a><br>
                      End Date: {{$event->endDate}}<br>
                    @endforeach
                  </div>
                </div>
                <br>


          </div>

          </div>
        </div>
      </div>
</div>

@endif
<!-- Modal -->


@include('includes.modal')

@endsection('content')
@section('scripts')

<script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

<script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>

@endsection
