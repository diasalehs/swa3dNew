@extends('layouts.app')
 @section('content')
@if(auth::user()->userType==0)


<div class="container" style="margin:100px auto">
    <div class="row " >

        <div class="col-lg-8 offset-md-2">
        @if(auth::user()->verified==0)
        <div class="alert alert-warning" role="alert">
        <strong>We sent you an Email !</strong> Please check your inbox to verify your account.
        </div>
        @endif
        @if(auth::user()->verified==1)
        <div class="alert alert-success" role="alert">
         <strong>Verified!</strong> You are good to go.
        </div>
            @endif

            <div class="card">
                <div class="card-header">Individual Register</div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('allRegister') }}">{{ csrf_field() }}

                        <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Where are you from</label>
                        <div class="col-lg-6">
                            <select name="livingPlace" value="{{ old('livingPlace') }}" class="form-control" id="exampleSelect1">
                            <option value="city">city</option>
                            <option value="camp">camp</option>
                            <option value="village">village</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">Your city name</label>
                            <div class="col-lg-6">
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
                            <label for="name" class="col-lg-4 form-control-label">Your country name</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}"
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
                            <select name="gender" value="{{ old('gender') }}" class="form-control" id="exampleSelect1">
                            <option value="male">male</option>
                            <option value="female">female</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Your date of birth</label>
                            <div class="col-lg-6">
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
                            <label for="name" class="col-lg-4 form-control-label">Your current Work</label>
                            
                            <div class="col-lg-6">
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
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Your educational level</label>
                        <div class="col-lg-6">
                            <select name="educationalLevel" value="{{ old('educationalLevel') }}" class="form-control" id="exampleSelect1">
                            <option value="school">school</option>
                            <option value="colleage">colleage</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
                        <div class="col-lg-6">
                            <select name="preVoluntary" value="{{ old('preVoluntary') }}" class="form-control" id="exampleSelect1">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                            </select>
                        </div>
                        </div>

                        <div class="form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Voluntary Years</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="voluntaryYears" value="{{ old('voluntaryYears') }}"
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
                                <button type="submit" class="btn btn-success btn-block">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@else
 <div class="container" style=" margin:100px auto">
    <div class="row">
        <div class="col-lg-8 offset-md-2">
        @if(auth::user()->verified==0)
<div class="alert alert-warning" role="alert">
<strong>We sent you an Email !</strong> Please check your inbox to verify your account.
</div>
@endif
 @if(auth::user()->verified==1)
<div class="alert alert-success" role="alert">
  <strong>Verified!</strong> You are good to go.
</div>
@endif
            <div class="card">
                <div class="card-header">Institute Register</div>
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('allRegister') }}">{{ csrf_field() }}


                        <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                            <label for="email" class="col-lg-4 form-control-label">The license number</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="license" value="{{ old('license') }}"
                                required="required" />
                                @if ($errors->has('license'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('license') }}
                                    </div>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <label  class="col-lg-4 form-control-label" for="exampleSelect1">Where are you from</label>
                            <div class="col-lg-6">
                                <select name="livingPlace" class="form-control" id="exampleSelect1">
                                <option value="city">city</option>
                                <option value="camp">camp</option>
                                <option value="village">village</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">City name</label>
                            <div class="col-lg-6">
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
                            <label for="name" class="col-lg-4 form-control-label">Your country name</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="country" value="{{ old('country') }}"
                                required="required" />
                                @if ($errors->has('country'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('country') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('workSummary') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Work summary</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="workSummary" value="{{ old('workSummary') }}"
                                required="required" />
                                @if ($errors->has('workSummary'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('workSummary') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <label  class="col-lg-4 form-control-label" for="exampleSelect1">Work summary</label>
                            <div class="col-lg-6">
                                <select name="workSummary" class="form-control" id="exampleSelect1">
                                <option value="0">do 0</option>
                                <option value="1">do 1</option>
                                <option value="2">do 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('activities') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">The institute activities</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="activities" value="{{ old('activities') }}"
                                required="required" />
                                @if ($errors->has('activities'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('activities') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Mobile number</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="mobileNumber" value="{{ old('mobileNumber') }}"
                                required="required" />
                                @if ($errors->has('mobileNumber'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('mobileNumber') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="name" class="col-lg-4 form-control-label">Address</label>
                            <div class="col-lg-6">
                                <input id="name" type="text" class="form-control" name="address" value="{{ old('address') }}"
                                required="required" />
                                @if ($errors->has('address'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" class="btn btn-success btn-block">Register</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endif
        

 @endsection
