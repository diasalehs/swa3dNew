@extends('layouts.master')
@section('title')
  Swa3ed - {{$user->nameInEnglish}}

@endsection
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
      @if($available)
        <span class="badge badge-success">Available</span>
      @elseif(!$available)
        <span class="badge badge-default">Not Available</span>
      @endif
      <br>

      <span id="shr" style="display:none">{{$user->acc_avg}}</span>

      <div class="containerdiv" style="display:inline-block">

          <div>
          <img src="{{ URL::to('/') }}/vendor/images/stars_blank.png" alt="img">
          </div>
          <div class="cornerimage" style="width:0%;">
          <img src="{{ URL::to('/') }}/vendor/images/stars_full.png" alt="">
          </div>

      </div>

      <p class="" style=" color:#fff"><span>Volunteer</span> <span>{{$user->country}}</span> <span>{{$user->cityName}}</span> </p>

      @if(Auth::guest())
             <a class='btn btn-green'  href="{{route('login')}}">follow</a>
      @else
        @if($friend)
             <a class='btn btn-danger'  href="{{route('unfollow',$user->user_id)}}">unfollow</a>
        @elseif(!$friend)
             <a class='btn btn-green'  href="{{route('follow',$user->user_id)}}">follow</a>
        @endif
        @if($userUevents->count() > 0)
        <a class='btn btn-pink'  data-toggle="modal" data-target="#invite">invite</a>
        @endif
        @if($mine)
          @if($open)
            <a class='btn btn-danger'  href="{{route('closeProfile')}}">make it private</a>
          @elseif(!$open)
            <a class='btn btn-green'  href="{{route('openProfile')}}">make it public</a>
          @endif
        @endif
      @endif




    </div>
  </div>

    @if($open || $mine)
  <div class="container">
    <div class="row">

        <div class="col-md-8 col-sm-12">
          <div class="card" >
            <div class="card-block">
              <h4 class="card-title greencolor">Volunteer Information</h4>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Gender: {{$user->gender}}</li>
              <li class="list-group-item">  Birth Date: {{$user->dateOfBirth}}</li>
              <li class="list-group-item">Education: {{$user->educationalLevel}}</li>
              <li class="list-group-item">Current Work: {{$user->currentWork}}</li>
              <li class="list-group-item">Availabel from: {{$user->availableFrom}} to: {{$user->availableTo}}</li>
            </ul>

          </div>


                <br>

                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title greencolor">Events Joined In</h4>
                    <p class="card-text">
                    @foreach($myevents as $event)
                      Event Title: <a href="{{route('event',$event->id)}}" >{{$event->title}}</a><br>
                      End Date: {{$event->endDate}}<br>
                    @endforeach
                  </div>
                </div>
                <br>


          </div>
          <div class="col-sm-12 col-md-4">
            <div class="card" >
              <div class="card-block">
                <h4 class="card-title greencolor">Contact Informations</h4>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Email: {{$user->email}}</li>
                <li class="list-group-item">Address: {{$user->address}}</li>
                <li class="list-group-item">Mobile number: {{$user->mobileNumber}}</li>
                <li class="list-group-item">Facebook Page: <a href="{{$user->facebookPage}}">{{$user->facebookPage}}</a></li>
              </ul>
              <div class="card-block">
                <a href="{{route('messenger',$user->email)}}" class="card-link green-link">Send Message</a>
              </div>
            </div>
<br />


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
<script>
var rate= $('#shr').text()*20;
$(".cornerimage").animate({width: rate}, 1000, 'linear');
</script>

@endsection
