<div class="col-sm-12 col-md-4  col-lg-3 ">

<div class=" nav-side-menu" style="    border-top-right-radius: .25rem;
    border-top-left-radius: .25rem;   ">
    <div class="brand">Brand Log</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">

            <ul id="menu-content" class="menu-content  collapse out">
                 <li>
                  <a href="{{route('event',$event->id)}}">
                  <i class="fa fa-user fa-lg"></i> Details
                  </a>
                  </li>
                   <li>
                    <a href="{{route('eventPosts',$event->id)}}">
                    <i class="fa fa-users fa-lg"></i> Posts
                    </a>
                  </li>
                  <li>
                    <a href="{{route('eventReviews',$event->id)}}">
                    <i class="fa fa-users fa-lg"></i> Reviews
                    </a>
                  </li>
                 <li>
                  <a href="{{route('acceptedVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Volunteers
                  </a>
                </li>
                @if($mine)
                 <li>
                  <a href="{{route('unacceptedVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Remove Volunteers
                  </a>
                </li>
                <li>
                  <a href="{{route('rateVolunteers',$event->id)}}">
                  <i class="fa fa-users fa-lg"></i> Rate Volunteers
                  </a>
                </li>
                @endif
            </ul>
     </div>
</div>
</div>
