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
                    <h4 class="card-title">Achievement Events </h4>
                    <p class="card-text">
                    @foreach($Aevents as $Aevent)
                      Event Title: <a href="{{route('event',$Aevent->id)}}" >{{$Aevent->title}}</a><br>
                      End Date: {{$Aevent->endDate}}<br>
                    @endforeach
                  </div>
                </div>
                <br>


          </div>
           <div class="col-4">
            <div class="card">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-block dcb">
                <table class="table">

                  <tbody>
                    <tr>
                      <td>Voluntary years</td>
                      {{-- <td>{{$user->voluntaryYears}}</td> --}}
                    </tr>
                    <tr>
                      <td>cat1</td>
                      <td>{{$user->cat1}}</td>
                    </tr>
                    <tr>
                      <td>cat2</td>
                      <td>{{$user->cat2}}</td>
                    </tr>
                     <tr>
                      <td>cat3</td>
                      <td>{{$user->cat3}}</td>
                    </tr>
                     <tr>
                      <td>cat4</td>
                      <td>{{$user->cat4}}</td>
                    </tr>
                     <tr>
                      <td>acc </td>
                      <td>{{$user->acc_avg}}</td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td>
                      {{-- @if(auth::check()) --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate-modal">
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
      <form action="{{route('rank',$user->id)}}" method="get">
      <div class="modal-body">
        <label>cat1</label>
        <input type="text" name="cat1"><br>
        <label>cat2</label>
        <input type="text" name="cat2"><br>
        <label>cat3</label>
        <input type="text" name="cat3"><br>
        <label>cat4</label>
        <input type="text" name="cat4"><br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save</button>

      </div>
      </form>

    </div>
  </div>
</div>


@endsection('content')
