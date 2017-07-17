@extends('layouts.app')
 @section('content')
@if(auth::user()->userType==0)


<div class="container" style="margin:100px auto">

        <div class="col-lg-10 offset-md-1">
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
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('allRegister') }}">{{ csrf_field() }}
                        <!-- Nav tabs -->


                        <!-- Tab panes -->
                        <div class="tab-content">
                          <div id="step1content" class="tab-pane active" id="home" role="tabpanel" style="margin-top:0px">
                            <div class="row">

                            <div class="  col-sm-12 col-md-6 form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                                <label for="email" class=" form-control-label">First Name</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}"
                                    required="required" />
                                    @if ($errors->has('firstName'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('firstName') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}
                            {{--  --}}
                            <div class="col-sm-12 col-md-6 form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label">Last Name</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}"
                                    required="required" />
                                    @if ($errors->has('lastName'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('lastName') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}{{--  --}}
                            <div class="col-sm-12 col-md-6 form-group{{ $errors->has('ARFirst') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label">Your Arabic First</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control" name="ARFirst" value="{{ old('ARFirst') }}"
                                    required="required" />
                                    @if ($errors->has('ARFirst'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('ARFirst') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}{{--  --}}
                            <div class="col-sm-12 col-md-6 form-group{{ $errors->has('ARlast') ? ' has-error' : '' }}">
                                <label for="email" class=" form-control-label">Your Arabic last</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control" name="ARlast" value="{{ old('ARlast') }}"
                                    required="required" />
                                    @if ($errors->has('ARlast'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('ARlast') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}{{--  --}}
                            <div class="col-sm-12 col-md-6 form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                              <label for="name" class=" form-control-label">Your Country</label>
                                <div class="">
                                  <select class="form-control" onchange="yesnoCheck(this);">
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS" selected>Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>

                                  </select>

                                    @if ($errors->has('cityName'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('cityName') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}{{--  --}}
                            <div id="palestineCity"  class="col-sm-12 col-md-6 form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                                <label for="email" class=" form-control-label">Your city name</label>
                                <div class="">
                                    <select id="palC" name="cityName" class="form-control">
                                      <option value="nablus">Nablus</option>
                                      <option value="jericho">Jericho (Ariha)</option>
                                      <option value="qabatiya	">Qabatiya	</option>
                                    </select>
                                    @if ($errors->has('cityName'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('cityName') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--  --}}{{--  --}}
                            <div id="otherCity" style="display:none" class="col-sm-12 col-md-6 form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                                <label for="email" class="form-control-label">Your city name</label>
                                <div class="">
                                    <input id="otherC" name="x"  type="text" class="form-control"  value="{{ old('cityName') }}"
                                    required="required" />
                                    @if ($errors->has('cityName'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('cityName') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            {{--  --}}
                            <div class="col-sm-12 col-md-6 form-group{{ $errors->has('dateOfBirth') ? ' has-error' : '' }}">
                                <label for="name" class=" form-control-label">Your date of birth</label>
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

                                                    <div class="col-sm-12 col-md-6 form-check form-check-inline">
                                                      <label for="exampleInputEmail1">Gender</label><br />

                                                      <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked> Male
                                                      </label>
                                                      <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="female"> Female
                                                      </label>

                                                    </div>

                            {{--  --}}
                           {{--  <div class="col-sm-12 col-md-6 form-group{{ $errors->has('currentWork') ? ' has-error' : '' }}">
                                <label for="name" class=" form-control-label">Your current Work</label>

                                <div class="">
                                    <input id="name" type="text" class="form-control" name="currentWork" value="{{ old('currentWork') }}"
                                    required="required" />
                                    @if ($errors->has('currentWork'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('currentWork') }}
                                        </div>

                                    @endif
                                </div>
                            </div> --}}
                            {{--  --}}
                          <div class="col-sm-12 col-md-6 form-group">
                                <label  class=" form-control-label" for="exampleSelect1">Your Current Work</label>
                            <div class="">
                                <select name="currentWork" value="{{ old('currentWork') }}" class="form-control" id="exampleSelect1">
                                <option value="School Student">School Student</option>
                                <option value="University Student">University Student</option>
                                <option value="Governmental Employee">Governmental Employee</option>
                                <option value="Private sector Employee">Private sector Employee</option>
                                <option value="NGO Employee">NGO Employee</option>
                                <option value="Self-employed">Self-employed</option>
                                <option value="Business Owner">Business Owner</option>
                                <option value="Unemployed">Unemployed</option>
                                </select>
                            </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-12 col-md-6 form-group">
                                <label  class=" form-control-label" for="exampleSelect1">Your educational level</label>
                            <div class="">
                                <select name="educationalLevel" value="{{ old('educationalLevel') }}" class="form-control" id="exampleSelect1">
                                <option value="High School">High School</option>
                                <option value="BSc">BSc</option>
                                <option value="MSc">MSc</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                                </select>
                            </div>
                            </div>
                            {{--  --}}
                            <div class="col-sm-12 col-md-6 form-group">
                                <label  class="form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
                            <div class="">
                                <select name="preVoluntary" value="{{ old('preVoluntary') }}" class="form-control" id="vy" onchange="vyyesno(this)">
                                <option value="0">No</option>
                                <option value="1" selected>Yes</option>
                                </select>
                            </div>
                            </div>
                            {{--  --}}
                            <div id="vyn" class="col-sm-12 col-md-6 form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
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
                            {{--  --}}

                          </div>
                          <br />
                          <div class=" form-group">
                              <div class="col-lg-4 offset-md-4">
                                  <button onclick="nextStep()" class="btn btn-green btn-block">Next</button>
                              </div>
                          </div>
                        </div>

                          <div id="step2content"class="tab-pane" id="profile" role="tabpanel" style="margin-top:0px">

                            <button onclick="prevStep()" class="btn btn-green ">Back</button>



                          </div>
                          <div class="tab-pane" id="messages" role="tabpanel">...</div>
                          <div class="tab-pane" id="settings" role="tabpanel">...</div>

                        {{--  --}}
                      </div>
                    </form>
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
