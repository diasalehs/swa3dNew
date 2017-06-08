@extends('layouts.app')
@section('content')
<div class="container" style="margin: 120px auto">
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                    <h4 class="card-header">Login</h4>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">E-Mail Address</label>
                            <div class="col-lg-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required="required" autofocus="autofocus" />
                                @if ($errors->has('email'))

                                <div class="alert alert-danger" role="alert">
                                    <strong>Oh snap! </strong>{{ $errors->first('email') }}
                                </div>


                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-lg-4 form-control-label">Password</label>
                            <div class="col-lg-6">
                                <input id="password" type="password" class="form-control" name="password"
                                required="required" />@if ($errors->has('password')) <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>
@endif</div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 ">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" remember="remember" class="form-check-input" checked="checked"
                                        :=":" /> Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-8 ">
                                <button type="submit" class="btn btn-success choose-btn">Login</button> 
                                <a class="btn btn-link" href="{{ route('password.request') }}">

                                    Forgot Your Password?

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
