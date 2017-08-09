<div class="col-sm-12 col-md-4  col-lg-3 nav-side-menu-div" style="">

<div class=" nav-side-menu" style="  ">
    <div class="brand">Menu</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content  collapse out">
                  <a href="{{route('event',$event->id)}}">
                      <li style="  border-top: 1px solid  rgba(0,0,0,.125);    border-top-right-radius: .25rem;
    border-top-left-radius: .25rem;">
                        <i class="fa fa-user fa-lg"></i> Details
                      </li>
                  </a>

                  <a href="{{route('eventPosts',$event->id)}}">
                   <li>
                    <i class="fa fa-users fa-lg"></i> Posts
                  </li>
                  </a>
                  <a href="{{route('eventReviews',$event->id)}}">
                  <li>
                    <i class="fa fa-users fa-lg"></i> Reviews
                  </li>
                 </a>
                 <a href="{{route('acceptedVolunteers',$event->id)}}">
                 <li >
                  <i class="fa fa-users fa-lg"></i> Volunteers
                </li>
              </a>

                @if($mine)
                  @if($archived == 0)
                   <a href="{{route('unacceptedVolunteers',$event->id)}}">
                 <li>
                  <i class="fa fa-users fa-lg"></i> Volunteer Requests
                </li>
              </a>
                  @elseif($archived == 1)
                    <a href="{{route('rateVolunteers',$event->id)}}">
                <li>
                  <i class="fa fa-users fa-lg"></i> Rate Volunteers
                </li>
              </a>
                  @endif
                @endif
            </ul>
     </div>
</div>

</div>
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
