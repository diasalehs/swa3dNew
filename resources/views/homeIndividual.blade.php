@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
        <div class="col-sm-12  col-md-4  col-lg-3 sidebar">
            <div class="text-center">

            <div class=" circular--landscape">
                <img class="profile-pic text-center" src="vendor/img/user.png">
            </div>
                <h5 class="profile-name-indi">{{$user->name}}</h5>
                <small><a href="#">{{$user->email}}</a></small>
            </div>
            <hr>
            <ul class="list-group ">
                <a href="#" class="list-group-item justify-content-between">Profile   <span class="badge badge-default badge-pill"></span></a>
                <a href="#" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>
                <a href="#" class="list-group-item  justify-content-between">Followers    <span class="badge badge-default badge-pill">14</span></a>
                <a href="#" class="list-group-item  justify-content-between">Following    <span class="badge badge-default badge-pill">32</span></a>
                <a href="#" class="list-group-item  justify-content-between">Activities    <span class="badge badge-default badge-pill">4</span></a>
                <a href="#" class="list-group-item  justify-content-between">Messages   <span class="badge badge-default badge-pill">1</span></a>
            </ul>
         </div>
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <div class="jumbotron">
              <h1 class="display-3" style="">Hello, {{$user->name}}!</h1>
              <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
              <hr class="my-4">
              <p class="lead">
                <a class="btn btn-primary btn-lg bv" href="#" role="button">Volunteer Now</a>
                <a class="btn btn-primary btn-lg mg" href="#" role="button">Make Group</a>
              </p>
            </div>
            <div class="row yrp">
              <div class="col-sm-6 col-xs-6 col-md-6 ">
                <h3>Your Info</h3>
              </div>
              <div class="col-sm-6 col-xs-6 col-md-6 text-xs-right text-md-right text-sm-right">
                <button type="button" class="btn edit-btn">Edit</button>

              </div>
            </div>
            <ul class="list-group">
              <li class="list-group-item">Living Place:   {{ ucfirst($userIndividual->livingPlace)}} </li>
              <li class="list-group-item">City Name:   {{ ucfirst($userIndividual->cityName) }} </li>
              <li class="list-group-item">Country Name:    {{ ucfirst($userIndividual->country) }}</li>
              <li class="list-group-item">Current Work:   {{ ucfirst($userIndividual->currentWork) }} </li>
              <li class="list-group-item">Educational Level:   {{ ucfirst($userIndividual->educationalLevel) }} </li>
              <li class="list-group-item">Voluntary Experiance:   {{$userIndividual->voluntaryYears}}</li>
              <li class="list-group-item">Date Of Birth:    {{$userIndividual->dateOfBirth}}</li>
            </ul>



         </div>
    </div>
</div>

@endsection
