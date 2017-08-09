@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
<div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
  <div id="accordion" role="tablist" aria-multiselectable="true">
    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a class="green-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Primary information
          </a>
        </h5>
      </div>

      <div id="collapseOne" class="collapse " role="tabpanel" aria-labelledby="headingOne">
        <div class="card-block">
          <form enctype="multipart/form-data" role="form" method="POST" action="{{ route('profileEdit') }}">{{ csrf_field() }}
            <div class="row">

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
                      <input id="name" type="text" class="form-control" name="firstName" value="{{$userIndividual->firstInEnglish }}"
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
                      <input id="name" type="text" class="form-control" name="lastName" value="{{ $userIndividual->lastInEnglish }}"
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
                      <input id="name" type="text" class="form-control" name="ARfirst" value="{{  $userIndividual->firstInArabic }}"
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
                      <input id="name" type="text" class="form-control" name="ARlast" value="{{  $userIndividual->lastInArabic }}"
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
                      <input id="name" type="text" class="form-control" name="cityName" value="{{  $userIndividual->cityName }}"
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
                      <input id="theDate" type="date" class="form-control" name="dateOfBirth"  min="" value="{{  $userIndividual->dateOfBirth}}"
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
                  <label  class=" form-control-label" for="exampleSelect1">Your Current Work</label>
               <div class="">
                  <select name="currentWork" value="{{ $userIndividual->currentWork}}" class="form-control" id="exampleSelect1">
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
                  <select name="educationalLevel" value="{{  $userIndividual->educationalLevel}}" class="form-control" id="exampleSelect1">
                  <option value="High School">High School</option>
                  <option value="BSc">BSc</option>
                  <option value="MSc">MSc</option>
                  <option value="Diploma">Diploma</option>
                  <option value="PhD">PhD</option>
                  </select>
               </div>
             </div>
              {{--  --}}
                 {{--  What is the major of education if the vistor is university student or above?, Choosing from Options (, , , , , , , , .etc)--}}
            <div class="form-group col-sm-12 col-md-6">
                  <label  class=" form-control-label" for="exampleSelect1">Major Education Level</label>
               <div class="">
                  <select name="Major" value="{{  $userIndividual->Major }}" class="form-control" id="exampleSelect1">
                  <option value="IT">IT</option>
                  <option value="Engineering">Engineering</option>
                  <option value="Medicin"> Medicin</option>
                  <option value="Law">Law</option>
                  <option value="Art">Art</option>
                  <option value="Business">Business</option>
                  <option value="Social Science">Social Science</option>
                  <option value="Litreture">Litreture</option>
                  <option value="Other">Other</option>
                  </select>
              </div>
              </div>
              {{-- Yes or No Options only (If Yes, the next field will appear) --}}

              <div class="col-sm-12 col-md-6 form-group">
                  <label  class="form-control-label" for="exampleSelect1">Do you have any expriments on Voluntary</label>
               <div class="">
                  <select name="preVoluntary" value="{{ $userIndividual->preVoluntary}}" class="form-control" id="vy" onchange="vyyesno(this)">
                  <option value="0">No</option>
                  <option value="1" selected>Yes</option>
                  </select>
               </div>
              </div>
              {{--  --}}
              <div id="vyn" class="col-sm-12 col-md-6 form-group{{ $errors->has('voluntaryYears') ? ' has-error' : '' }}">
                  <label for="name" class="form-control-label">Voluntary Years</label>
                  <div class="">
                      <input id="name" type="text" class="form-control" name="voluntaryYears" value="{{  $userIndividual->voluntaryYears}}"
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

          </div>
      </div>
    </div>
    <br>
    <div class="card">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <a class="collapsed green-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Optional information
          </a>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo">
        <div class="card-block">
          <div class="row">

          <div class="form-group col-sm-12 col-md-6 {{ $errors->has('picture') ? ' has-error' : '' }}">
              <label for="picture" class="form-control-label">Profile Picture</label>
              <div class="">
                  <input id="picture" type="file" accept="image/*"  class="form-control" name="image" value="{{ $user->picture}}"
                  autofocus="autofocus" />
                  @if ($errors->has('picture'))
                          <div class="alert alert-danger" role="alert">
                          <strong>Warning!</strong> {{ $errors->first('picture') }}
                       </div>
                  @endif
              </div>
          </div>

            <div class="form-group col-sm-12 col-md-6 {{ $errors->has('mobileNumber') ? ' has-error' : '' }}">
                <label for="mobileNumber" class="form-control-label">Mobile Number</label>
                <div class="">
                    <input id="mobileNumber" type="phone" class="form-control" name="mobileNumber" value="{{ $userIndividual->mobileNumber }}"
                    autofocus="autofocus" />
                    @if ($errors->has('mobileNumber'))
                            <div class="alert alert-danger" role="alert">
                            <strong>Warning!</strong> {{ $errors->first('mobileNumber') }}
                         </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-sm-12 col-md-6 {{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address" class="form-control-label">Full Address</label>
                <div class="">
                    <input id="address" type="tel" class="form-control" name="address" value="{{ $userIndividual->address }}"
                    autofocus="autofocus" />
                    @if ($errors->has('address'))
                            <div class="alert alert-danger" role="alert">
                            <strong>Warning!</strong> {{ $errors->first('address') }}
                         </div>
                    @endif
                </div>
            </div>


          </div>

          <div class="row">
            <div class="col-12 ">
              <label for="name" class="form-control-label">Qualifications</label>
              <ul class="list-group" >
                @foreach($qualifications as $qualification)

                <li class="list-group-item" style="min-height:53px;justify-content: space-between;">
                  <a data-toggle="modal" data-target="#{{ $qualification->id }}"class="green-link" style="cursor: pointer">

                  {{ $qualification->voluntaryWork }},
                  {{ $qualification->role }},
                  {{ $qualification->achievements }}
                </a>
                  <a href="{{route('deleteQualification',$qualification->id)}}" class="pink-link float-xs-right" ><i class="fa fa-trash" aria-hidden="true"></i>  Delete</a>
                </li>

                @endforeach

              </ul>
              <div class="row justify-content-center">
                <button type="button"style="margin-top:20px;" class="btn btn-green btn-block col-sm-12 col-md-6" data-toggle="modal" data-target="#Qualifications">
                  Add new qualifications
                </button>
              </div>

            </div>
          </div>

        </div>

      </div>
    </div>

    </div>
  <br />
    <div class="row justify-content-center">
      <div class="col-sm-6 col-md-2" style="margin-bottom:20px;">
        <button class="btn btn-pink btn-block " >cancel</button>
      </div>
      <div class="col-sm-6 col-md-2">
        <button type="submit" class="btn btn-green btn-block">Edit</button>

      </div>
  </div>
</div>

        </form>

      </div>
    </div>
    @foreach($qualifications as $qualification)
      @include('includes.QualificationsModal')
    @endforeach
    @include('includes.QualificationsModalAdd')

{{--  --}}
{{--  --}}


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
