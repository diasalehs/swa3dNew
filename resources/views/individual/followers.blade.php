<?php 
use App\user;
?>
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
                <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>
                <a href="{{route('allusers')}}" class="list-group-item  justify-content-between">all users<span class="badge badge-default badge-pill">{{$user->count()}}</span></a>
                <a href="{{route('followers')}}" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">{{$followers->count()}}</span></a>
                <a href="{{route('following')}}" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">{{$following->count()}}</span></a>
                <a href="#" class="list-group-item  justify-content-between">Messages   <span class="badge badge-default badge-pill">1</span></a>
            </ul>
         </div>
         <div class="col-lg-9">
        <h2>all followers</h2>
          <div class="table-responsive" style="min-height: 300px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($followers as $follower) {
                $usere=User::findOfFail($follower->requested_id);
                 echo "<tr>
              <td>".$usere->name."</td>
              <td>".$usere->email."</td>
              <td>
              <a class='btn btn-success btn-block'  href='allusers/".$usere->id."'>follow</a>
              </td>
                </tr>";

              }?></tbody>
                       </div>
    </div>
</div>
   
@endsection
