@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row ">
    @include('individual/includes.sidebar')
        <div class="col-lg-6">

            <div class="card">

                <div class="card-header">Make Initiative</div>
                <div class="card-block">
                  <div class="row justify-content-center">
                        <form class="col-lg-12" role="form" method="POST" action="{{ route('makeInitiativePost') }}">{{ csrf_field() }}

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

                            <div class="form-group">
                            <label  class="form-control-label" for="exampleSelect1">Where are you from</label>
                        <div class="">
                            <select name="livingPlace" value="{{ old('livingPlace') }}" class="form-control" id="exampleSelect1">
                            <option value="city">city</option>
                            <option value="camp">camp</option>
                            <option value="village">village</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                            <label for="email" class="form-control-label">Your city name</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="cityName" value="{{ old('cityName') }}"
                                required="required" />
                                @if ($errors->has('cityName'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('cityName') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="name" class="form-control-label">Your country name</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}"
                                required="required" />
                                @if ($errors->has('country'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('country') }}
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                            <label for="name" class="form-control-label">Your date of birth</label>
                            <div class="">
                                <input id="theDate" type="date" class="form-control" name="dateOfBirth"  min="" value="{{ old('dateOfBirth') }}"
                                required="required" />
                                @if ($errors->has('dateOfBirth'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('dateOfBirth') }}
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('currentWork') ? ' has-error' : '' }}">
                            <label for="name" class="form-control-label">Your current Work</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="currentWork" value="{{ old('currentWork') }}"
                                required="required" />
                                @if ($errors->has('currentWork'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('currentWork') }}
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
                        <div class="">
                            <select name="preVoluntary" value="{{ old('preVoluntary') }}" class="form-control" id="exampleSelect1">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
                            <label for="name" class="form-control-label">Voluntary Years</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="voluntaryYears" value="{{ old('voluntaryYears') }}"
                                required="required" />
                                @if ($errors->has('voluntaryYears'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('voluntaryYears') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                            <div class="form-group" style="margin-bottom:0">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success choose-btn btn-block">Submit</button>
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
