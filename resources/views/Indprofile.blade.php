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
      <p class=""style="color:#fff"><span>Volunteer</span> <span>{{$user->country}}</span> <span>{{$user->cityName}}</span> </p>

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
            <a class='btn btn-blue'  href="{{route('closeProfile')}}">close</a>
          @elseif(!$open)
            <a class='btn btn-blue'  href="{{route('openProfile')}}">open</a>
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
          <div class=" col-lg-4">
            <div class="card">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-block dcb">
                <table class="table rate-table">

                  <tbody>
                    <tr>
                      <td>Voluntary years</td>
                      <td><div class="showrate" id="sh1"></div><span id="shr1">{{$user->voluntaryYears}}</span></td>
                    </tr>
                    <tr>
                      <td>cat1</td>
                      <td><div class="showrate" id="sh2"></div><span id="shr2">{{$user->cat1}}</span></td>
                    </tr>
                    <tr>
                      <td>cat2</td>
                      <td><div class="showrate" id="sh3"></div><span id="shr3">{{$user->cat2}}</span></td>
                    </tr>
                     <tr>
                      <td>cat3</td>
                      <td><div class="showrate" id="sh4"></div><span id="shr4">{{$user->cat3}}</span></td>
                    </tr>
                     <tr>
                      <td>cat4</td>
                      <td><div class="showrate" id="sh5"></div><span id="shr5">{{$user->cat4}}</span></td>
                    </tr>
                     <tr>
                      <td>acc </td>
                      <td><div class="showrate" id="sh6"></div><span id="shr6">{{$user->acc_avg}}</span></td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td>
                      {{-- @if(auth::check()) --}}

                      <button type="button" class="btn btn-green btn-block" data-toggle="modal" data-target="#rate-modal">
                       Rate!
                      </button>

                      {{-- @endif --}}
                    </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
          </div>
        </div>
      </div>
</div>

@endif
<!-- Modal -->
<div class="modal fade" id="rate-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('rank',$user->user_id)}}" method="get">
      <div class="modal-body rate-modal">
        <label>cat1</label>
        <input type="text" name="cat1" class="cat1">
        <div id="r1" class="c"onclick="rate(1)"></div>
        <label>cat2</label>
        <input type="text" name="cat2" class="cat2">
        <div id="r2" class="c" onclick="rate(2)"></div>
        <label>cat3</label>
        <input type="text" name="cat3" class="cat3">
        <div id="r3" class="c" onclick="rate(3)"></div>
        <label>cat4</label>
        <input type="text" name="cat4" class="cat4">
        <div id="r4" class="c" onclick="rate(4)"></div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-green">Save</button>

      </div>
      </form>

    </div>
  </div>
</div>

@include('includes.modal')

@endsection('content')
