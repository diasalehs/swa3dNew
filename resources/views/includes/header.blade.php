<div id="navtop"></div>
<nav class="navbar mainNavbar navbar-toggleable-lg navbar-light bg-faded  fixed-top"style="background-image:url('{{ URL::to('/') }}/pp/newlogo-min.png');    background-repeat: no-repeat;
    padding-left:0px;
    background-size: 65px;
background-position-x: 8px;
background-position-y: 7px;">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="{{ route('main') }}" style="padding-left:80px;">SWA3ED</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto" >
       <li class="nav-item">
       <a class="nav-link" href="#" >Get to know us</a>
     </li>
      <li class="nav-item">
       <a class="nav-link" href="#">How to use the website</a>
     </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('institutes')}}">Institutes</a>
     </li>
      <li class="nav-item ">
        <a class="nav-link" href="{{route('upComingEvents')}}">Events</a>

      </li>
   

       <li class="nav-item">
        <a class="nav-link" href="{{route('allResearches')}}">Researches</a>
      </li>
     
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto nav-right">
          <li class="nav-item HeaderSearchli">

          <form action="{{route('search')}}" method="get" >
            <input type="text" name="name" id="HeaderSearch" class="HeaderSearch form-control" placeholder="&#xF002; Search Swa3ed.." style="font-family:Arial,FontAwesome;    height: 41px;">
            <button type="submit" style="display: none;"></button>
          </form>




          </li>
            <li class="nav-item">
            @if (Auth::guest())
              <a class="nav-link" data-toggle="modal" style="cursor:pointer"data-target="#myModal">Join Us</a>

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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Join us As</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-center" style="margin-bottom:20px;">
            <div class=" col-md-8 col-sm-10">
              <a class="btn btn-block btn-green "  href="{{route('registerer',0)}}">Individual</a>
            </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8 col-sm-10">
            <a class="btn btn-block btn-green "  href="{{route('registerer',1)}}">Institute</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
