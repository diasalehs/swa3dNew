@if(auth::user()->userType == 0)
<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
        <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user->picture}}">
    </div>
        <h5  class="profile-name-indi"><a href="{{route('profile',$user->id)}}">{{$user->name}}</a></h5>
        <small><a href="{{route('messenger',$user->email)}}">{{$user->email}}</a></small>
        <br />
        <button type="button" class="btn btn-green btn-sm" data-toggle="modal" data-target="#avModal">
          Change Availablety
        </button>
    </div>
    <hr>
    <ul class="list-group">
        <a href="{{route('home')}}" class="list-group-item justify-content-between">Dashboard  <span class="badge badge-default badge-pill"></span></a>
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


<!-- Modal -->
<div class="modal fade" id="avModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Availability -not availabile-</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="{{route('availability')}}" method="POST"> {{ csrf_field() }}

        <div class="form-group row">
          <label for="example-datetime-local-input" class="col-4 col-form-label">From</label>
          <div class="col-8">
            <input id="theDate" type="date" class="form-control" name="availableFrom"  min="" value="<?php echo date("Y-m-d"); ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="example-datetime-local-input" class="col-4 col-form-label">To</label>
          <div class="col-8">
            <input id="theDate" type="date" class="form-control" name="availableTo"  min="" value="<?php echo date("Y-m-d"); ?>"/>
          </div>
          </div>


            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-green">Save changes</button>
      </form>

      </div>
    </div>
  </div>
</div>
 @endif
