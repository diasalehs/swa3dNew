<?php 
use App\user;
?>
@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('includes.sidebar')
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
        <h2>all following</h2>
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
              foreach ($following as $followi) {
                $usere=User::find($followi->requested_id);
                 echo "<tr>
              <td>".$usere->name."</td>
              <td>".$usere->email."</td>
              <td>
              <a class='btn btn-success btn-block'  href='allusers/unfollow/".$usere->id."'>unfollow</a>
              </td>
                </tr>";}
              ?>

         </div>
    </div>
</div>

@endsection
