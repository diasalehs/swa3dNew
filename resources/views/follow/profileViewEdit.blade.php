@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
<div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
              <div class="card">
                  <div class="card-header">Edit Your Information</div>
                  <div class="card-block">

                    <form class="" role="form" method="POST" action="{{ route('profileEdit') }}">{{ csrf_field() }}


                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-lg-4 form-control-label">Name</label>
                                <div class="col-lg-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"
                                    required="required" autofocus="autofocus" />
                                    @if ($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('name') }}
                                            </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-lg-4 form-control-label">E-Mail Address</label>
                                <div class="col-lg-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                                    required="required" />
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-lg-4 form-control-label">Password</label>
                                <div class="col-lg-6">
                                    <input id="password" type="password" class="form-control" name="password" value="" />
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-lg-4 form-control-label">Confirm Password</label>
                                <div class="col-lg-6">
                                    <input id="password-confirm" type="password" class="form-control" value="" name="password_confirmation"/>
                                </div>
                            </div>

                        <div class="form-group">
                        <label  class="col-lg-4 form-control-label" for="exampleSelect1">Where are you from</label>
                        <div class="col-lg-6">
                            <select name="livingPlace" value="{{ $userIndividual->livingPlace }}" class="form-control" id="exampleSelect1">
                            <option value="city">city</option>
                            <option value="camp" >camp</option>
                            <option value="village" selected>village</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">Your city name</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="cityName" value="{{ $userIndividual->cityName }}"
                                required="required" />
                                @if ($errors->has('cityName'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('cityName') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Your country name</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="country" value="{{ $userIndividual->country }}"
                                required="required" />
                                @if ($errors->has('country'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('country') }}
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Gender</label>
                        <div class="col-lg-6">
                            <select name="gender" value="{{ $userIndividual->gender }}" class="form-control" id="exampleSelect1">
                            <option value="male">male</option>
                            <option value="female">female</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Your date of birth</label>
                            <div class="col-lg-6">
                                <input id="theDate" type="date" class="form-control" name="dateOfBirth"  min="" value="{{ $userIndividual->dateOfBirth }}"
                                required="required" />
                                @if ($errors->has('dateOfBirth'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('dateOfBirth') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('currentWork') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Your curren tWork</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="currentWork" value="{{ $userIndividual->currentWork }}"
                                required="required" />
                                @if ($errors->has('currentWork'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('currentWork') }}
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Your educational level</label>
                        <div class="col-lg-6">
                            <select name="educationalLevel" value="{{ $userIndividual->educationalLevel }}" class="form-control" id="exampleSelect1">
                            <option value="school">school</option>
                            <option value="colleage">colleage</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
                        <div class="col-lg-6">
                            <select name="preVoluntary" value="{{ $userIndividual->preVoluntary }}" class="form-control" id="exampleSelect1">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Voluntary Years</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="voluntaryYears" value="{{ $userIndividual->voluntaryYears }}"
                                required="required" />
                                @if ($errors->has('voluntaryYears'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('voluntaryYears') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" class="btn btn-success btn-block">Edit</button>
                            </div>
                        </div>

                    </form>
                  </div>
              </div>
        </div>
      </div>
</div>

@endsection('content')
