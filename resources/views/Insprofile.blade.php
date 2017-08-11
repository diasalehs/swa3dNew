@extends('layouts.master')

@section('content')

<div class="viewProfile">
  <div class="jumbotron jumbotron-fluid text-center"style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)),url({{ URL::to('/vendor/img/newlogo.png')}});
  background-size:contain;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container">
      <div class=" circular--landscape">
          <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
      </div>

      <h1 class="display-7" style="color:#fff">{{$user->nameInEnglish}}</h1>
      <span>{{$user->acc_avg}}</span>
      <p class="" style="color:#fff"><span>Volunteer</span> <span>{{$user->country}}</span> <span>{{$user->cityName}}</span> </p>


      @if(Auth::guest())
             <a class='btn btn-green'  href="{{route('login')}}">follow</a>
      @else
        @if($friend)
             <a class='btn btn-green'  href="{{route('unfollow',$user->user_id)}}">unfollow</a>
        @elseif(!$friend)
             <a class='btn btn-green'  href="{{route('follow',$user->user_id)}}">follow</a>
        @endif
        @if($mine)
          @if($open)
            <a class='btn btn-danger'  href="{{route('closeProfile')}}">make it private</a>
          @elseif(!$open)
            <a class='btn btn-danger'  href="{{route('openProfile')}}">make it public</a>
          @endif
        @endif
      @endif

    </div>
  </div>

  @if($open || $mine)
  <div class="container">
    <div class="row">

        <div class="col-8">

                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">User Informations</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                    address: {{$user->address}}<br>
                    Establishment year: {{$user->establishmentYear}}<br>
                    Employment rate: {{$user->employmentRate}}<br>
                    Number of employees: {{$user->numOfEmployees}}<br>
                    Number of stakeholders: {{$user->numOfStakeholders}} <br>
                    Work summary: {{$user->workSummary}} <br>
                    license: {{$user->license}} <br>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Contact Informations</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                    Email: {{$user->email}}<br>
                    Adress: {{$user->address}}<br>
                    Mobile number: {{$user->mobileNumber}}<br>
                    PObox: {{$user->PObox}}<br>
                    Fax: {{$user->fax}}<br>
                    Website: <a href="{{$user->website}}">{{$user->website}}</a><br>
                    Facebook Page: <a href="{{$user->facebookPage}}">{{$user->facebookPage}}</a><br>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    <a href="{{route('messenger',$user->email)}}" class="card-link green-link">Send Message</a>
                  </div>
                </div>

                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Events held </h4>
                    <p class="card-text">
                    @foreach($Aevents as $Aevent)
                      Event Title: <a href="{{route('event',$Aevent->id)}}" >{{$Aevent->title}}</a><br>
                      End Date: {{$Aevent->endDate}}<br>
                    @endforeach
                  </div>
                </div>
                <br>
                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Achievements</h4>
                    <p class="card-text">
                    @foreach($achievements as $A)
                     <a href="{{URL::to('/')}}/view/{{$A->id}}" >{{$A->title}}</a><br>

                    @endforeach
                  </div>
                </div>
                <br>
                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Activies</h4>
                    <p class="card-text">
                    @foreach($activities as $A)
                    <a href="{{URL::to('/')}}/view/{{$A->id}}" >{{$A->title}}</a><br>

                    @endforeach
                  </div>
                </div>
                <br>


          </div>

        </div>
      </div>
</div>

@endif

@endsection('content')
