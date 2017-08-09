@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
  <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
      <div class="card">
            <div class="card-block">
<form class="" role="form" method="POST" action="{{ route('editInitiative',$initiative->id) }}">{{ csrf_field() }}
                  <div class="row">
                    <div class="col-12">
                      <h4 class="greencolor">Edit Your Initiative</h4>
                      <hr />
                    </div>

                    
                  <div class="form-group col-sm-12 col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                      <label for="name" class="form-control-label">Name</label>
                      <div class="">
                          <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}"
                          required="required" autofocus="autofocus" />
                          @if ($errors->has('name'))
                                  <div class="alert alert-danger" role="alert">
                                  <strong>Warning!</strong> {{ $errors->first('name') }}
                               </div>
                          @endif
                      </div>
                  </div>

                  <div class="form-group col-sm-12 col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                      <label for="email" class=" form-control-label">E-Mail Address</label>
                      <div class="">
                          <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"
                          required="required" />
                          @if ($errors->has('email'))
                              <div class="alert alert-danger" role="alert">
                                  <strong>Warning!</strong> {{ $errors->first('email') }}
                              </div>
                          @endif
                      </div>
                  </div>

                   <div class="form-group col-sm-12 col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                       <label for="password" class=" form-control-label">Password</label>
                       <div class="">
                          <input id="password" type="password" class="form-control" name="password" value="" />
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
                          <input id="password-confirm" type="password" class="form-control" value="" name="password_confirmation"/>
                       </div>
                   </div>


              {{--  --}}
               <div class="  col-sm-6 col-md-3 form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                   <label for="email" class=" form-control-label">First Name</label>
                   <div class="">
                      <input id="name" type="text" class="form-control" name="firstName" value="{{$initiative->firstInEnglish }}"
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
              <div class="col-sm-6 col-md-3  form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                  <label for="email" class="form-control-label">Last Name</label>
                  <div class="">
                      <input id="name" type="text" class="form-control" name="lastName" value="{{ $initiative->lastInEnglish }}"
                      required="required" />
                      @if ($errors->has('lastName'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('lastName') }}
                          </div>
                      @endif
                  </div>
              </div>
              {{--  --}}{{--  --}}
              <div class="col-sm-6 col-md-3  form-group{{ $errors->has('ARfirst') ? ' has-error' : '' }}">
                  <label for="email" class="form-control-label">Your Arabic First</label>
                  <div class="">
                      <input id="name" type="text" class="form-control" name="ARfirst" value="{{  $initiative->firstInArabic }}"
                      required="required" />
                      @if ($errors->has('ARfirst'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('ARfirst') }}
                          </div>
                      @endif
                  </div>
              </div>
              {{--  --}}{{--  --}}
              <div class="col-sm-6 col-md-3  form-group{{ $errors->has('ARlast') ? ' has-error' : '' }}">
                  <label for="email" class=" form-control-label">Your Arabic last</label>
                  <div class="">
                      <input id="name" type="text" class="form-control" name="ARlast" value="{{  $initiative->lastInArabic }}"
                      required="required" />
                      @if ($errors->has('ARlast'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('ARlast') }}
                          </div>
                      @endif
                  </div>
              </div>
              {{--  --}}{{--  --}}
              <div class="col-sm-12 col-md-6 form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="name" class=" form-control-label">Your Country</label>
                  <div class="">
                    <select name="country" class="form-control" onchange="yesnoCheck(this)">
                               @include('includes.countriesModal')
                        </select>

                      @if ($errors->has('cityName'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('cityName') }}
                          </div>
                      @endif
                  </div>
              </div>
              {{--  --}}{{--  --}}
              <div id="palestineCity"  class="col-sm-12 col-md-6 form-group{{ $errors->has('cityName') ? ' has-error' : ''    }}">
                  <label for="email" class=" form-control-label">Your city name</label>
                  <div class="">
                      <select class="form-control">
                        <option value="nablus">Nablus</option>
                        <option value="jericho">Jericho (Ariha)</option>
                        <option value="qabatiya">Qabatiya </option>
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
                      <input id="name" type="text" class="form-control" name="cityName" value="{{  $initiative->cityName }}"
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
                      <input id="theDate" type="date" class="form-control" name="dateOfBirth"  min="" value="{{  $initiative->dateOfBirth}}"
                      required="required" />
                      @if ($errors->has('dateOfBirth'))
                          <div class="alert alert-danger" role="alert">
                              <strong>Warning!</strong> {{ $errors->first('dateOfBirth') }}
                          </div>
                      @endif
                  </div>
              </div>
{{--  --}}
              <div class="col-sm-12 col-md-6 form-group">
                  <label  class="form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
               <div class="">
                  <select name="preVoluntary" value="{{ $initiative->preVoluntary}}" class="form-control" id="vy" onchange="vyyesno(this)">
                  <option value="0">No</option>
                  <option value="1" selected>Yes</option>
                  </select>
               </div>
              </div>
              {{--  --}}
              <div id="vyn" class="col-sm-12 col-md-6 form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
                  <label for="name" class="form-control-label">Voluntary Years</label>
                  <div class="">
                      <input id="name" type="text" class="form-control" name="voluntaryYears" value="{{  $initiative->voluntaryYears}}"
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

                {{--  --}}
                <div class="col-12" style="margin-top:20px;">
                  <h4 class="greencolor">Your targets</h4>
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
                  <h4 class="greencolor">Your intresets</h4>
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

@section('scripts')

  <script type="text/javascript">

  function yesnoCheck(that) {
          if (that.value == "Palestine") {
              document.getElementById("palestineCity").style.display = "block";
              document.getElementById("otherCity").style.display = "none";
              $('#palC').attr('name', 'cityName');
              $('#otherC').attr('name', 'x');

          } else {
            document.getElementById("otherCity").style.display = "block";
            document.getElementById("palestineCity").style.display = "none";
            $('#otherC').attr('name', 'cityName');
            $('#palC').attr('name', 'x');

          }
      }
      function vyyesno(that) {
              if (that.value == "0") {
                  document.getElementById("vyn").style.display = "none";
              } else {
                document.getElementById("vyn").style.display = "block";
              }
          }
          </script>

 @endsection
