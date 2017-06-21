<div id="navtop"></div>
<nav class="navbar mainNavbar navbar-toggleable-md navbar-light bg-faded  fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ route('main') }}">SWA3ED</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="{{route('upComingEvents')}}">UpComing Events</a>

      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Volunteers</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="#" style="color: #f06493">DONATE NOW</a>
     </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">

          <form action="{{route('search')}}" method="get" >
            <input type="text" name="search" id="search"class="search form-control" placeholder="&#xF002;" style="font-family:Arial, FontAwesome">
            <button type="submit" style="display: none;"></button>
          </form>



          </li>
            <li class="nav-item">
            @if (Auth::guest())
              <a class="nav-link"  href="{{ route('choose') }}">Join Us</a>

            </li>

      <li class="nav-item ">

        <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only"></span></a>
      @else
                            <li class="dropdown dropdown-menu-nav  nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                  <li>
                                   <a class="dropdown-item" href="{{ route('home') }}">Your Profile</a>

                                  </li>
                                    <div class="dropdown-divider"></div>

                                    <li>
                                        <a class="dropdown-item pinkcolor"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                                          <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           @if(auth::user()->flag == 0)
                                                     {{auth::user()->delete()}}
                                           @endif

                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
      </li>


      </ul>
    </div>
  </div>
</nav>
