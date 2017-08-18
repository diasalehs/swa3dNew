@extends('layouts.master')
@section('title')
  Swa3ed - {{$user->nameInEnglish}}

@endsection
@section('content')

<div class="viewProfile">
  <div class="jumbotron jumbotron-fluid text-center"style="background-image: linear-gradient(rgba(19, 58, 83, 0.7),rgba(19, 58, 83, 0.7)),url({{ URL::to('/vendor/img/newlogo.png')}});
  background-size:contain;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container">
      <div class=" circular--landscape">
          <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
      </div>
      <span id="shr1" style="display:none">{{$user->acc_avg}}</span>

      <h1 class="display-7" style="color:#fff">{{$user->nameInEnglish}}</h1>
      <div class="containerdiv" style="display:inline-block">

          <div>
          <img src="{{ URL::to('/') }}/vendor/images/stars_blank.png" alt="img">
          </div>
          <div class="cornerimage" style="width:0%;">
          <img src="{{ URL::to('/') }}/vendor/images/stars_full.png" alt="">
          </div>

      </div>

      <p class="" style="color:#fff"><span></span> <span>{{$user->country}}</span> <span>{{$user->cityName}}</span> </p>


      @if(Auth::guest())
             <a class='btn btn-green'  href="{{route('login')}}">follow</a>
      @else
        @if($friend)
             <a class='btn btn-danger'  href="{{route('unfollow',$user->user_id)}}">unfollow</a>
        @elseif(!$friend)
             <a class='btn btn-green'  href="{{route('follow',$user->user_id)}}">follow</a>
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

        <div class="col-sm-12 col-md-8">
          <div class="card" >
            <div class="card-block">
              <h4 class="card-title greencolor">Institute Informations</h4>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Address: {{$user->address}}</li>
              <li class="list-group-item">Establishment year: {{$user->establishmentYear}}</li>
              <li class="list-group-item">Employment rate: {{$user->employmentRate}}</li>
              <li class="list-group-item">Number of employees: {{$user->numOfEmployees}}</li>
              <li class="list-group-item">Number of stakeholders: {{$user->numOfStakeholders}}</li>
              <li class="list-group-item">Work summary: {{$user->workSummary}} </li>
              <li class="list-group-item">License: {{$user->license}}</li>
            </ul>
            <div class="card-block">
              <a href="{{route('messenger',$user->email)}}" class="card-link green-link">Send Message</a>
            </div>
          </div>

          <br>

          <div class="card">
          <div class="card-block">
            <h4 class="card-title greencolor">Events held </h4>
            <p class="card-text">
            @foreach($Aevents as $Aevent)
              Event Title: <a href="{{route('event',$Aevent->id)}}" >{{$Aevent->title}}</a><br>
              End Date: {{$Aevent->endDate}}<br>
            @endforeach
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-block">
            <h4 class="card-title greencolor">Achievements</h4>
            <p class="card-text">
            @foreach($achievements as $A)
             <a href="{{URL::to('/')}}/view/{{$A->id}}" >{{$A->title}}</a><br>

            @endforeach
          </div>
        </div>
        <br>
        <div class="card">
          <div class="card-block">
            <h4 class="card-title greencolor">Activies</h4>
            <p class="card-text">
            @foreach($activities as $A)
            <a href="{{URL::to('/')}}/view/{{$A->id}}" >{{$A->title}}</a><br>

            @endforeach
          </div>
        </div>
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
                      <li class="list-group-item">PObox: {{$user->PObox}}</li>
                      <li class="list-group-item">  Website: <a href="{{$user->website}}">{{$user->website}}</a></li>
                      <li class="list-group-item">Facebook Page: <a href="{{$user->facebookPage}}">{{$user->facebookPage}}</a></li>
                    </ul>
                    <div class="card-block">
                      <a href="{{route('messenger',$user->email)}}" class="card-link green-link">Send Message</a>
                    </div>
                  </div>



              </div>

                <br>


          </div>

        </div>
        <br>

      </div>
</div>

@endif

@endsection('content')
@section('scripts')
<script>
var rate= $('#shr1').text()*20;
$(".cornerimage").animate({width: rate}, 1000, 'linear');
</script>

@endsection
