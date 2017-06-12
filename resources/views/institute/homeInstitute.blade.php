@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
        <div class="col-lg-3 sidebar">
            <div class="text-center">

            <div class=" circular--landscape"> 
                <img class="profile-pic text-center" src="vendor/img/user.png">
            </div>
                <h5 class="profile-name">{{$user->name}}</h5>
                <small><a href="#">{{$user->email}}</a></small>
            </div>
            <hr>
            <ul class="list-group">
                <a href="#" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>
                <a href="#" class="list-group-item  justify-content-between">Followers    <span class="badge badge-default badge-pill">14</span></a>
                <a href="#" class="list-group-item  justify-content-between">Following    <span class="badge badge-default badge-pill">32</span></a>
                <a href="#" class="list-group-item  justify-content-between">Activities    <span class="badge badge-default badge-pill">4</span></a>
                <a href="#" class="list-group-item  justify-content-between">Messages   <span class="badge badge-default badge-pill">1</span></a>
            </ul>
         </div>
         <div class="col-lg-9">
                <h1>Hello, Individual!</h1>
                <h1>License: {{$userInstitute->license}} </h1>
                <h1>Living Place: {{$userInstitute->livingPlace}} </h1>
                <h1>City Name: {{$userInstitute->cityName}} </h1>
                <h1>Country Name: {{$userInstitute->country}} </h1>
                <h1>Work Summary: {{$userInstitute->workSummary}} </h1>
                <h1>Activities: {{$userInstitute->activities}} </h1>
                <h1>Mobile Number: {{$userInstitute->mobileNumber}} </h1>
                <h1>Address: {{$userInstitute->address}} </h1>

         </div>
    </div>
</div>

@endsection
