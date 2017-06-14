
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
        <a href="{{route('followersInstitute')}}" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">{{$followers->count()}}</span></a>
        <a href="{{route('followingInstitute')}}" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">{{$following->count()}}</span></a>
        <a href="{{route('myEvents')}}" class="list-group-item  justify-content-between">Up Coming Events<span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
        <a href="{{route('archiveMyEvents')}}" class="list-group-item  justify-content-between">Archived Events<span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
 </div>
