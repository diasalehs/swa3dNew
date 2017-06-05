<div id="navtop"></div>
<nav class="navbar navbar-toggleable-md navbar-light bg-faded  fixed-top">
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
        <a class="nav-link" href="#">Who we are</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Supporters</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Contact us</a>
      </li>
    
    </ul>
    <div class="form-inline my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
       @if (Auth::guest())

        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true" data-backdrop="static"
></i>
Login <span class="sr-only"></span></a>
 @else
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item"  href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

<div class="modal fade" id="login-modal" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i>
  Sign in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <div class="container">

      <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only {{ $errors->has('email') ? ' has-error' : '' }}">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name ="email" value="{{ old('email') }}" required autofocus>
         @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label for="inputPassword" class="sr-only {{ $errors->has('password') ? ' has-error' : '' }}">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me" {{ old('remember') ? 'checked' : '' }}> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block sign-in-btn" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->      </div>
      
    </div>
  </div>
</div>