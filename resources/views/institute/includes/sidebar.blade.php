@if(auth::user()->userType == 1)
<div class="col-sm-12 z col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
    </div>
        <h5  class="profile-name-indi"><a href="{{route('profile',$user->id)}}">{{$user->name}}</a></h5>
        <small><a href="{{route('messenger',$user->email)}}">{{$user->email}}</a></small>
    </div>
    <hr>
    <ul class="list-group">
        <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashboard   <span class="badge badge-default badge-pill"></span></a>
        <a href="{{route('followers')}}" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">{{$followers->count()}}</span></a>
        <a href="{{route('following')}}" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">{{$following->count()}}</span></a>
        <a href="{{route('myEvents')}}" class="list-group-item  justify-content-between">Events Manager</a>
        <a href="{{route('messenger')}}" class="list-group-item  justify-content-between">Messenger</a>
        <a href="{{route('myNews')}}" class="list-group-item  justify-content-between">My News</a>
 </div>
@endif