<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
    </div>
        <h5 class="profile-name-indi">{{$user->name}}</h5>
        <small><a href="#">{{$user->email}}</a></small>
    </div>
    <hr>
    <ul class="list-group">
        <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashboard  <span class="badge badge-default badge-pill"></span></a>
        <a href="{{route('allusers')}}" class="list-group-item  justify-content-between">All users<span class="badge badge-default badge-pill">{{auth::user()->count()}}</span></a>
        <a href="{{route('followers')}}" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">{{$followers->count()}}</span></a>
        <a href="{{route('following')}}" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">{{$following->count()}}</span></a>
        @if(auth::user()->Individuals->researcher == 1)
        <a href="{{route('myResearches')}}" class="list-group-item  justify-content-between">My Researches<span class="badge badge-default badge-pill">{{$researches->count()}}</span></a>
        @endif
        <a href="{{route('myUpComingEvents')}}" class="list-group-item  justify-content-between">My UpComing Events<span class="badge badge-default badge-pill">{{$myUpComingEvents->count()}}</span></a>
        <a href="{{route('myArchiveEvents')}}" class="list-group-item  justify-content-between">My Archive Events<span class="badge badge-default badge-pill">{{$myArchiveEvents->count()}}</span></a>
        <a href="{{route('messenger')}}" class="list-group-item  justify-content-between">Messenger</a>
        <a href="{{route('myInitiatives')}}" class="list-group-item  justify-content-between">My Initiatives<span class="badge badge-default badge-pill">{{$myInitiatives->count()}}</span></a>
    </ul>
 </div>
