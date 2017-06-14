<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
    </div>
        <h5 class="profile-name-re">{{$user->name}}</h5>
        <small><a href="#">{{$user->email}}</a></small>
    </div>
    <hr>
    <ul class="list-group">
        <a href="" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>
        <a href="" class="list-group-item  justify-content-between">All users<span class="badge badge-default badge-pill">2</span></a>
        <a href="" class="list-group-item  justify-content-between">Followers<span class="badge badge-default badge-pill">2</span></a>
        <a href="" class="list-group-item  justify-content-between">Following<span class="badge badge-default badge-pill">2</span></a>

        <a href="#" class="list-group-item  justify-content-between">Messages   <span class="badge badge-default badge-pill">16</span></a>
    </ul>
 </div>
