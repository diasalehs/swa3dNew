<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{URL::to('vendor/img/user.png')}}">
    </div>
        <h5 class="profile-name-re">{{$user->name}}</h5>
        <small><a href="#">{{$user->email}}</a></small>
    </div>
    <hr>
    <ul class="list-group">
        <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashboard   <span class="badge badge-default badge-pill"></span></a>
        <a href="{{route('allusers')}}" class="list-group-item  justify-content-between">All users<span class="badge badge-default badge-pill">{{$user->count()}}</span></a>
        <a href="{{route('followers')}}" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">{{$followers->count()}}</span></a>
        <a href="{{route('following')}}" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">{{$following->count()}}</span></a>

    </ul>
 </div>
