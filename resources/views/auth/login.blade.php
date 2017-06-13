@extends('layouts.app')
@section('content')
<div class="container" style="margin: 120px auto">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                    <h4 class="card-header">Login</h4>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class=" form-control-label">E-Mail Address</label>
                            <div class="">
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
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="form-control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password"
                                required="required" />@if ($errors->has('password')) <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>
@endif
                        </div>
                        <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" remember="remember" class="form-check-input" checked="checked"
                                        :=":" /> Remember Me</label>
                                </div>
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-success choose-btn">Login</button>
                                <a class="btn btn-link link-green" href="{{ route('password.request') }}">

                                    Forgot Your Password?

                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
