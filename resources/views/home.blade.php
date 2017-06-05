@extends('layouts.app')

@section('content')
<div class="container" style="margin:150px auto">
    <div class="row">
        <div class="col-lg-3">
            <div class="text-center profile-pic"> 
                <img class="  profile-pic" src="vendor/img/user.png">
            </div>
            <ul class="list-group">
                <li class="list-group-item justify-content-between"><a href="#">Dashbourd</a>    <span class="badge badge-default badge-pill">14</span>
</li>
                <li class="list-group-item  justify-content-between"><a href="#">Followers</a>    <span class="badge badge-default badge-pill">14</span></li>
                <li class="list-group-item  justify-content-between"><a href="#">Following</a>    <span class="badge badge-default badge-pill">14</span></li>
                <li class="list-group-item  justify-content-between"><a href="#">Activities</a>    <span class="badge badge-default badge-pill">14</span></li>
                <li class="list-group-item  justify-content-between"><a href="#">Messages</a>    <span class="badge badge-default badge-pill">14</span></li>
            </ul>
         </div>
         <div class="col-lg-9">


         </div>
    </div>
</div>
@endsection
