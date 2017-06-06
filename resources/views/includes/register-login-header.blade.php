<div id="navtop"></div>
<nav class="navbar mainNavbar navbar-toggleable-md navbar-light bg-faded  fixed-top">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ route('main') }}">SWA3ED</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Researches</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Volunteers</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Voluntary Opportunitie</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">About us</a>
      </li>
    
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
            @if (Auth::guest())
              <a class="nav-link"  href="{{ route('choose') }}">Join Us</a>
              
            </li>

      <li class="nav-item ">

        <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only"></span></a>
      @else
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                  <li>
                                            <a class="dropdown-item" href="{{ route('home') }}">Your Profile</a>

                                  </li>
    <div class="dropdown-divider"></div>

                                    <li>
                                        <a class="dropdown-item text-danger"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     
                                          <i class="fa fa-sign-out" aria-hidden="true"></i>
  Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
      </li>
      <li class="nav-item ">
          <input type="text" name="search" class="search form-control" placeholder="&#xF002;" style="font-family:Arial, FontAwesome">

   
      </li>
    
      </ul>
    </div>
  </div>
</nav>