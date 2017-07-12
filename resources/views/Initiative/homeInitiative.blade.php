@extends('Initiative/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('Initiative/includes.sidebar')
        <div class="col-sm-12  col-md-8 push-sm-12 col-lg-9" style="color: #333">
          <div class="jumbotron" style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)),url({{ URL::to('/vendor/img/newlogo.png')}});
          background-size:contain;background-repeat: no-repeat;
          background-position: right top;
          background-attachment: fixed;
          ">
             <h1 class="display-4 " style="color:#fff">Hello, {{$user->nameInEnglish}}!</h1>
             <p class="lead" style="color:#fff">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
             <hr class="my-4 " style="background-color: #fff">
             <p class="lead">
               <a class="btn btn-primary btn-lg bv" href="{{route('makeEvent')}}" role="button">Create an Event</a>
             </p>
           </div>
           <div class="row yrp">
             <div class="col-sm-6 col-xs-6 col-md-6 ">
               <h3>Your Info</h3>
             </div>
             <div class="col-sm-6 col-xs-6 col-md-6 text-xs-right text-md-right text-sm-right">
                <form class="" role="form" method="GET" action="{{route('profileViewEdit')}}">{{ csrf_field() }}
                        <div class="form-group">
                                <button type="submit" class="btn edit-btn">Edit</button>
                        </div>
                </form>
              </div>
           </div>

           <ul class="list-group">
              <li class="list-group-item">Living Place:   {{ ucfirst($user->livingPlace)}} </li>
              <li class="list-group-item">City Name:   {{ ucfirst($user->cityName) }} </li>
              <li class="list-group-item">Country Name:    {{ ucfirst($user->country) }}</li>
              <li class="list-group-item">Current Work:   {{ ucfirst($user->currentWork) }} </li>
              <li class="list-group-item">Voluntary Experiance:   {{$user->voluntaryYears}}</li>
              <li class="list-group-item">Date Of Birth:    {{$user->dateOfBirth}}</li>
            </ul>

        </div>

    </div>
</div>

@endsection
