@if(auth::user()->userType == 0)
<div class="col-sm-12  col-md-4  col-lg-3 sidebar">
    <div class="text-center">

    <div class=" circular--landscape">
      <a class="text-change"data-toggle="modal" data-target="#changePhoto">
             Change photo
         </a>
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
    <div class=" nav-side-menu" style="  ">
        <div class="brand">Menu</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
        <ul id="menu-content" class="menu-content  collapse out">
          <a href="{{route('home')}}">
              <li style="  border-top: 1px solid  rgba(0,0,0,.125);    border-top-right-radius: .25rem;
border-top-left-radius: .25rem;">
                <i class="fa fa-user fa-lg"></i> Dashboard
              </li>
          </a>
          <a href="{{route('allusers')}}">
          <li>
            <i class="fa fa-users fa-lg"></i> All users
          </li>
         </a>
          <a href="{{route('followers')}}">
           <li>
            <i class="fa fa-users fa-lg"></i> Followers
          </li>
          </a>
          <a href="{{route('following')}}">
          <li>
            <i class="fa fa-users fa-lg"></i> Following
          </li>
         </a>

        @if(auth::user()->Individuals->researcher == 1)
        <a href="{{route('myResearches')}}">
        <li>
          <i class="fa fa-users fa-lg"></i> My Researches
        </li>
       </a>
        @endif
        <a href="{{route('myUpComingEvents')}}">
        <li>
          <i class="fa fa-users fa-lg"></i> My UpComing Events
        </li>
       </a>
       <a href="{{route('myArchiveEvents')}}">
       <li>
         <i class="fa fa-users fa-lg"></i> My Archive Events
       </li>
      </a>
      <a href="{{route('messenger')}}">
      <li>
        <i class="fa fa-users fa-lg"></i> Messenger
      </li>
     </a>
     <a href="{{route('myInitiatives')}}">
     <li>
       <i class="fa fa-users fa-lg"></i> My Initiatives
     </li>
    </a>

    </ul>
  </div>
</div>
</div>
<div class="modal fade" id="changePhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('pictureEdit') }}">{{ csrf_field() }}
          <div class="form-group col-sm-12 col-md-12 {{ $errors->has('picture') ? ' has-error' : '' }}">
              <label for="picture" class="form-control-label">Profile Picture</label>
              <div class="">
                  <input id="picture" type="file" accept="image/*"  class="form-control" name="image" value="{{ $user->picture}}"
                  autofocus="autofocus" />
                  @if ($errors->has('picture'))
                          <div class="alert alert-danger" role="alert">
                          <strong>Warning!</strong> {{ $errors->first('picture') }}
                       </div>
                  @endif
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
            <input  id="example-datetime-local-input"type="date" class="form-control datepicker" name="availableFrom"  min="" value="<?php echo date("Y-m-d"); ?>"/>
          </div>
        </div>
        <div class="form-group row">
          <label for="datetime-local-input" class="col-4 col-form-label">To</label>
          <div class="col-8">
            <input id="datetime-local-input" type="date" class="form-control datepicker" name="availableTo"  min="" value="<?php echo date("Y-m-d"); ?>"/>
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

 @section('sidebarS')
 <script type="text/javascript">
 $(window).scroll(function() {
   sessionStorage.scrollTop = $(this).scrollTop();
 });

 $(document).ready(function() {
   if (sessionStorage.scrollTop != "undefined") {
     $(window).scrollTop(sessionStorage.scrollTop);
   }
 });

  </script>
  @endsection
