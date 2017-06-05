@extends('layouts.app')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
        <div class="col-lg-3">
            <div class="text-center">

            <div class=" circular--landscape"> 
                <img class="profile-pic text-center" src="vendor/img/user.png">
            </div>
                <h5 class="profile-name">Mazen Shanti</h5>
                <small><a href="#">@m.shanti</a></small>
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
                <h1>Hello, Dump!</h1>

         </div>
    </div>
</div>
@endsection
