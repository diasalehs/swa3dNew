<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{URL::to('vendor/img/user.png')}}">
    </div>
        <h5 class="profile-name-indi">{{$user->name}}</h5>
        <small><a href="#">{{$user->email}}</a></small>
    </div>
    <hr>
    <ul class="list-group">
        <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>

        <a href="{{route('makeEvent')}}" class="list-group-item  justify-content-between">Make Event</a>
        <a href="{{route('myEvents')}}" class="list-group-item  justify-content-between">My Events<span class="badge badge-default badge-pill">{{$events->count()}}</span></a>
 </div>
