@extends('layouts.app')
 @section('content')
<div class="container" style="margin-top:100px;margin-bottom:40px;">
    <div class="row justify-content-center">
        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">Register</div>
                <div class="card-block">
                  <div class="row justify-content-center">
                        <form class="col-lg-12" role="form" method="POST" action="{{ route('register') }}">{{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class=" form-control-label">Name</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    required="required" autofocus="autofocus" />
                                    @if ($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('name') }}
                                            </div>
                                    @endif
                                </div>
                            </div>


                                <div class="">
                                    <input id="name" type="text" style="display: none;" class="form-control" name="userType" value="{{ $user_type }}"
                                    />

                                </div>


                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label">E-Mail Address</label>
                                <div class="">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required="required" />
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="form-control-label">Password</label>
                                <div class="">
                                    <input id="password" type="password" class="form-control" name="password"
                                    required="required" />
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class=" form-control-label">Confirm Password</label>
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required="required" />
                                </div>
                            </div>

                            <div class="form-group" style="margin-bottom:0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success choose-btn btn-block">Next →</button>
                                </div>
                            </div>

                        </form>
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
