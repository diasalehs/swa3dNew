@extends('layouts.app')
 @section('content')
<div class="container" style="margin:100px auto">
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('register') }}">{{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Name</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required="required" autofocus="autofocus" />@if ($errors->has('name')) <span class="help-block">

                                        <strong>{{ $errors->first('name') }}</strong>

                                    </span>
@endif

</div>
                        </div>
                        <div class="class has('name') ? ' has->error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">E-Mail Address</label>
                            <div class="col-lg-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required="required" />@if ($errors->has('email')) <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>
@endif
</div>
                        </div>
                        <div class="class has('password') ? ' has->error' : '' }}">
                            <label for="password" class="col-lg-4 form-control-label">Password</label>
                            <div class="col-lg-6">
                                <input id="password" type="password" class="form-control" name="password"
                                required="required" />@if ($errors->has('password')) <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>
@endif</div>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-lg-4 form-control-label">Confirm Password</label>
                            <div class="col-lg-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required="required" />
                            </div>
                        </div>
                             <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Example select</label>
                            <div class="col-lg-6">
                            <select class="form-control" id="exampleSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection