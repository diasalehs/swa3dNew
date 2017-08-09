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
    <div class=" nav-side-menu" style="  ">
        <div class="brand">Menu</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

            <div class="menu-list">

                      <a href="{{route('home')}}">
                          <li style="  border-top: 1px solid  rgba(0,0,0,.125);    border-top-right-radius: .25rem;
        border-top-left-radius: .25rem;">
                            <i class="fa fa-user fa-lg"></i> Dashboard
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
                     <a href="{{route('myEvents')}}">
                     <li >
                      <i class="fa fa-users fa-lg"></i> Events Manager
                    </li>
                  </a>
                  <a href="{{route('messenger')}}">
                  <li >
                   <i class="fa fa-users fa-lg"></i> Messenger
                </li>
               </a>
               <a href="{{route('myNews')}}">
               <li >
                <i class="fa fa-users fa-lg"></i> My News
              </li>
            </a>
                </ul>
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
