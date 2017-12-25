@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
<div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <div class="card">
                <div class="card-block">
                    <form class="" role="form" method="POST" action="{{ route('profileEdit') }}">{{ csrf_field() }}
                      <div class="row">
                        <div class="col-12">
                          <h4 class="greencolor">Basic information</h4>
                          <hr />
                        </div>
                        {{--  --}}
                        <div class="  col-sm-12 col-md-6 form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                            <label for="email" class=" form-control-label">First name</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="firstName" value="{{ $userInstitute->firstInEnglish }}"
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
                            <label for="email" class="form-control-label">Last name</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="lastName" value="{{ $userInstitute->lastInEnglish }}"
                                required="required" />
                                @if ($errors->has('lastName'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('lastName') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{--  --}}{{--  --}}
                        <div class="col-sm-12 col-md-6 form-group{{ $errors->has('ARfirst') ? ' has-error' : '' }}">
                            <label for="email" class="form-control-label">First name in Arabic</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="ARfirst" value="{{ $userInstitute->firstInArabic }}"
                                required="required" />
                                @if ($errors->has('ARfirst'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('ARfirst') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{--  --}}{{--  --}}
                        <div class="col-sm-12 col-md-6 form-group{{ $errors->has('ARlast') ? ' has-error' : '' }}">
                            <label for="email" class=" form-control-label">Last name in Arabic</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="ARlast" value="{{ $userInstitute->lastInArabic }}"
                                required="required" />
                                @if ($errors->has('ARlast'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('ARlast') }}
                                    </div>
                                @endif
                            </div>
                        </div>


                            <div class="form-group col-sm-12 col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="form-control-label">Password</label>
                                <div class="">
                                    <input id="password" type="password" class="form-control" name="password" />
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Warning!</strong> {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label for="password-confirm" class="form-control-label">Confirm Password</label>
                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"/>
                                </div>
                            </div>

                        {{--  --}}{{--  --}}
                        <div class="col-sm-12 col-md-6 form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                          <label for="name" class=" form-control-label">Country</label>
                          <div class="" >
                          <select name="country" class="form-control" onchange="yesnoCheck(this)">
                               @include('includes.countriesModal')
                        </select>
                        @if ($errors->has('country'))

                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('country') }}
                            </div>
                        @endif
                    </div>
                </div>
                {{--  --}}{{--  --}}
                <div id="palestineCity"  class="col-sm-12 col-md-6 form-group{{ $errors->has('cityName') ? ' has-error' : '' }}">
                    <label for="email" class=" form-control-label">City</label>
                    <div class="">
                        <select id="palC" name="cityName"  class="form-control">
                          @include('includes.citiesModal')
                        </select>
                        @if ($errors->has('cityName'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('cityName') }}
                            </div>
                        @endif
                    </div>
                </div>
                {{--  --}}{{--  --}}
                <div id="otherCity" style="display:none" class="col-sm-12 col-md-6 form-group{{ $errors->has('x') ? ' has-error' : '' }}">
                    <label for="email" class="form-control-label">City</label>
                    <div class="">
                        <input id="otherC" name="x"  type="text" class="form-control" value="{{ $userInstitute->x }}"
                         />
                        @if ($errors->has('x'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('x') }}
                            </div>
                        @endif
                    </div>
                </div>


                        <div class="col-sm-12 col-md-6 form-check form-check-inline">
                        <label for="exampleInputEmail1">Place</label><br />
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="livingPlace" id="inlineRadio1" value="city" checked> City
                        </label>
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="livingPlace" id="inlineRadio1" value="camp"> Camp
                        </label>
                        <label class="form-check-label">
                          <input class="form-check-input" type="radio" name="livingPlace" id="inlineRadio1" value="village"> Village
                        </label>
                      </div>

                      <div class="col-sm-12 col-md-6 form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="name" class=" form-control-label">Address</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="address" value="{{ $userInstitute->address }}"
                                required="required" />
                                @if ($errors->has('address'))
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 form-group{{ $errors->has('establishmentYear') ? ' has-error' : '' }}">
                    <label for="name" class=" form-control-label">Establishment Year</label>
                    <div class="">
                        <input id="theDate" type="date" class="form-control" name="establishmentYear"  min="" value="{{ $userInstitute->establishmentYear }}"
                        required="required" />
                        @if ($errors->has('establishmentYear'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('establishmentYear') }}
                            </div>
                        @endif
                    </div>
                </div>


                        <div class="form-group col-sm-12 col-md-6 {{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
                <label for="mobileNumber" class="form-control-label">Mobile Number</label>
                <div class="">
                    <input id="mobileNumber" type="phone" class="form-control" name="mobileNumber" value="{{ $userInstitute->mobileNumber }}" />
                    @if ($errors->has('mobileNumber'))
                            <div class="alert alert-danger" role="alert">
                            <strong>Warning!</strong> {{ $errors->first('mobileNumber') }}
                         </div>
                    @endif
                </div>
            </div>

            </div>

                {{--  --}}
                <div class="col-12" style="margin-top:20px;">
                  <h4 class="greencolor">Groups you would like to work with</h4>
                  <hr />
                </div>
                <br />
                        {{--  --}}
                        <div class="row">
                         @foreach($targets as $t)
                          <div class="form-check col-4">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input name="targets[]" value="{{$t->id}}" type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">{{$t->name}}</span>
                            </label>
                          </div>
                          @endforeach
                      </div>
                      @if ($errors->has('targets'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('targets') }}
                            </div>
                        @endif

                {{--  --}}
                <div class="col-12" style="margin-top:20px;">
                  <h4 class="greencolor">Intresets</h4>
                  <hr />
                </div>
                <br />
                        {{--  --}}
                        <div class="row">
                         @foreach($intrests as $i)
                          <div class="form-check col-4">
                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input name="intrests[]" value="{{$i->id}}" type="checkbox" class="custom-control-input">
                              <span class="custom-control-indicator"></span>
                              <span class="custom-control-description">{{$i->name}}</span>
                            </label>
                          </div>
                          @endforeach
                      </div>
                      @if ($errors->has('intrests'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Warning!</strong> {{ $errors->first('intrests') }}
                            </div>
                        @endif

                      <br />
                      <hr />
                      <br />
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
