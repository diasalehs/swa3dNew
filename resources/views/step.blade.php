@extends('layouts.app')
 @section('content')
@if(auth::user()->userType==0)


<div class="container" style="margin:100px auto">
    <div class="row " >

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
                      <div class="row">
                        <div class="col-12">
                          <h4 class="greencolor">Basic information</h4>
                          <hr />
                        </div>
                        {{--  --}}
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
                        <div class="col-sm-12 col-md-6 form-group{{ $errors->has('ARfirst') ? ' has-error' : '' }}">
                            <label for="email" class="form-control-label">Your Arabic First</label>
                            <div class="">
                                <input id="name" type="text" class="form-control" name="ARfirst" value="{{ old('ARfirst') }}"
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
                              <select name="country" class="form-control" onchange="yesnoCheck(this);">
                              <option value="Afghanistan">Afghanistan</option>
                             <option value="Albania">Albania</option>
                             <option value="Algeria">Algeria</option>
                             <option value="American Samoa">American Samoa</option>
                             <option value="Andorra">Andorra</option>
                             <option value="Angola">Angola</option>
                             <option value="Anguilla">Anguilla</option>
                             <option value="Antartica">Antarctica</option>
                             <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                             <option value="Argentina">Argentina</option>
                             <option value="Armenia">Armenia</option>
                             <option value="Aruba">Aruba</option>
                             <option value="Australia">Australia</option>
                             <option value="Austria">Austria</option>
                             <option value="Azerbaijan">Azerbaijan</option>
                             <option value="Bahamas">Bahamas</option>
                             <option value="Bahrain">Bahrain</option>
                             <option value="Bangladesh">Bangladesh</option>
                             <option value="Barbados">Barbados</option>
                             <option value="Belarus">Belarus</option>
                             <option value="Belgium">Belgium</option>
                             <option value="Belize">Belize</option>
                             <option value="Benin">Benin</option>
                             <option value="Bermuda">Bermuda</option>
                             <option value="Bhutan">Bhutan</option>
                             <option value="Bolivia">Bolivia</option>
                             <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                             <option value="Botswana">Botswana</option>
                             <option value="Bouvet Island">Bouvet Island</option>
                             <option value="Brazil">Brazil</option>
                             <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                             <option value="Brunei Darussalam">Brunei Darussalam</option>
                             <option value="Bulgaria">Bulgaria</option>
                             <option value="Burkina Faso">Burkina Faso</option>
                             <option value="Burundi">Burundi</option>
                             <option value="Cambodia">Cambodia</option>
                             <option value="Cameroon">Cameroon</option>
                             <option value="Canada">Canada</option>
                             <option value="Cape Verde">Cape Verde</option>
                             <option value="Cayman Islands">Cayman Islands</option>
                             <option value="Central African Republic">Central African Republic</option>
                             <option value="Chad">Chad</option>
                             <option value="Chile">Chile</option>
                             <option value="China">China</option>
                             <option value="Christmas Island">Christmas Island</option>
                             <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                             <option value="Colombia">Colombia</option>
                             <option value="Comoros">Comoros</option>
                             <option value="Congo">Congo</option>
                             <option value="Congo">Congo, the Democratic Republic of the</option>
                             <option value="Cook Islands">Cook Islands</option>
                             <option value="Costa Rica">Costa Rica</option>
                             <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                             <option value="Croatia">Croatia (Hrvatska)</option>
                             <option value="Cuba">Cuba</option>
                             <option value="Cyprus">Cyprus</option>
                             <option value="Czech Republic">Czech Republic</option>
                             <option value="Denmark">Denmark</option>
                             <option value="Djibouti">Djibouti</option>
                             <option value="Dominica">Dominica</option>
                             <option value="Dominican Republic">Dominican Republic</option>
                             <option value="East Timor">East Timor</option>
                             <option value="Ecuador">Ecuador</option>
                             <option value="Egypt">Egypt</option>
                             <option value="El Salvador">El Salvador</option>
                             <option value="Equatorial Guinea">Equatorial Guinea</option>
                             <option value="Eritrea">Eritrea</option>
                             <option value="Estonia">Estonia</option>
                             <option value="Ethiopia">Ethiopia</option>
                             <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                             <option value="Faroe Islands">Faroe Islands</option>
                             <option value="Fiji">Fiji</option>
                             <option value="Finland">Finland</option>
                             <option value="France">France</option>
                             <option value="France Metropolitan">France, Metropolitan</option>
                             <option value="French Guiana">French Guiana</option>
                             <option value="French Polynesia">French Polynesia</option>
                             <option value="French Southern Territories">French Southern Territories</option>
                             <option value="Gabon">Gabon</option>
                             <option value="Gambia">Gambia</option>
                             <option value="Georgia">Georgia</option>
                             <option value="Germany">Germany</option>
                             <option value="Ghana">Ghana</option>
                             <option value="Gibraltar">Gibraltar</option>
                             <option value="Greece">Greece</option>
                             <option value="Greenland">Greenland</option>
                             <option value="Grenada">Grenada</option>
                             <option value="Guadeloupe">Guadeloupe</option>
                             <option value="Guam">Guam</option>
                             <option value="Guatemala">Guatemala</option>
                             <option value="Guinea">Guinea</option>
                             <option value="Guinea-Bissau">Guinea-Bissau</option>
                             <option value="Guyana">Guyana</option>
                             <option value="Haiti">Haiti</option>
                             <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                             <option value="Holy See">Holy See (Vatican City State)</option>
                             <option value="Honduras">Honduras</option>
                             <option value="Hong Kong">Hong Kong</option>
                             <option value="Hungary">Hungary</option>
                             <option value="Iceland">Iceland</option>
                             <option value="India">India</option>
                             <option value="Indonesia">Indonesia</option>
                             <option value="Iran">Iran (Islamic Republic of)</option>
                             <option value="Iraq">Iraq</option>
                             <option value="Ireland">Ireland</option>
                             <option value="Italy">Italy</option>
                             <option value="Jamaica">Jamaica</option>
                             <option value="Japan">Japan</option>
                             <option value="Jordan">Jordan</option>
                             <option value="Kazakhstan">Kazakhstan</option>
                             <option value="Kenya">Kenya</option>
                             <option value="Kiribati">Kiribati</option>
                             <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                             <option value="Korea">Korea, Republic of</option>
                             <option value="Kuwait">Kuwait</option>
                             <option value="Kyrgyzstan">Kyrgyzstan</option>
                             <option value="Lao">Lao People's Democratic Republic</option>
                             <option value="Latvia">Latvia</option>
                             <option value="Lebanon" selected>Lebanon</option>
                             <option value="Lesotho">Lesotho</option>
                             <option value="Liberia">Liberia</option>
                             <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                             <option value="Liechtenstein">Liechtenstein</option>
                             <option value="Lithuania">Lithuania</option>
                             <option value="Luxembourg">Luxembourg</option>
                             <option value="Macau">Macau</option>
                             <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                             <option value="Madagascar">Madagascar</option>
                             <option value="Malawi">Malawi</option>
                             <option value="Malaysia">Malaysia</option>
                             <option value="Maldives">Maldives</option>
                             <option value="Mali">Mali</option>
                             <option value="Malta">Malta</option>
                             <option value="Marshall Islands">Marshall Islands</option>
                             <option value="Martinique">Martinique</option>
                             <option value="Mauritania">Mauritania</option>
                             <option value="Mauritius">Mauritius</option>
                             <option value="Mayotte">Mayotte</option>
                             <option value="Mexico">Mexico</option>
                             <option value="Micronesia">Micronesia, Federated States of</option>
                             <option value="Moldova">Moldova, Republic of</option>
                             <option value="Monaco">Monaco</option>
                             <option value="Mongolia">Mongolia</option>
                             <option value="Montserrat">Montserrat</option>
                             <option value="Morocco">Morocco</option>
                             <option value="Mozambique">Mozambique</option>
                             <option value="Myanmar">Myanmar</option>
                             <option value="Namibia">Namibia</option>
                             <option value="Nauru">Nauru</option>
                             <option value="Nepal">Nepal</option>
                             <option value="Netherlands">Netherlands</option>
                             <option value="Netherlands Antilles">Netherlands Antilles</option>
                             <option value="New Caledonia">New Caledonia</option>
                             <option value="New Zealand">New Zealand</option>
                             <option value="Nicaragua">Nicaragua</option>
                             <option value="Niger">Niger</option>
                             <option value="Nigeria">Nigeria</option>
                             <option value="Niue">Niue</option>
                             <option value="Norfolk Island">Norfolk Island</option>
                             <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                             <option value="Norway">Norway</option>
                             <option value="Oman">Oman</option>
                             <option value="Pakistan">Pakistan</option>
                             <option value="Palau">Palau</option>
                             <option value="Palestine" selected>Palestine</option>
                             <option value="Panama">Panama</option>
                             <option value="Papua New Guinea">Papua New Guinea</option>
                             <option value="Paraguay">Paraguay</option>
                             <option value="Peru">Peru</option>
                             <option value="Philippines">Philippines</option>
                             <option value="Pitcairn">Pitcairn</option>
                             <option value="Poland">Poland</option>
                             <option value="Portugal">Portugal</option>
                             <option value="Puerto Rico">Puerto Rico</option>
                             <option value="Qatar">Qatar</option>
                             <option value="Reunion">Reunion</option>
                             <option value="Romania">Romania</option>
                             <option value="Russia">Russian Federation</option>
                             <option value="Rwanda">Rwanda</option>
                             <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                             <option value="Saint LUCIA">Saint LUCIA</option>
                             <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                             <option value="Samoa">Samoa</option>
                             <option value="San Marino">San Marino</option>
                             <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                             <option value="Saudi Arabia">Saudi Arabia</option>
                             <option value="Senegal">Senegal</option>
                             <option value="Seychelles">Seychelles</option>
                             <option value="Sierra">Sierra Leone</option>
                             <option value="Singapore">Singapore</option>
                             <option value="Slovakia">Slovakia (Slovak Republic)</option>
                             <option value="Slovenia">Slovenia</option>
                             <option value="Solomon Islands">Solomon Islands</option>
                             <option value="Somalia">Somalia</option>
                             <option value="South Africa">South Africa</option>
                             <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                             <option value="Span">Spain</option>
                             <option value="SriLanka">Sri Lanka</option>
                             <option value="St. Helena">St. Helena</option>
                             <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                             <option value="Sudan">Sudan</option>
                             <option value="Suriname">Suriname</option>
                             <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                             <option value="Swaziland">Swaziland</option>
                             <option value="Sweden">Sweden</option>
                             <option value="Switzerland">Switzerland</option>
                             <option value="Syria">Syrian Arab Republic</option>
                             <option value="Taiwan">Taiwan, Province of China</option>
                             <option value="Tajikistan">Tajikistan</option>
                             <option value="Tanzania">Tanzania, United Republic of</option>
                             <option value="Thailand">Thailand</option>
                             <option value="Togo">Togo</option>
                             <option value="Tokelau">Tokelau</option>
                             <option value="Tonga">Tonga</option>
                             <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                             <option value="Tunisia">Tunisia</option>
                             <option value="Turkey">Turkey</option>
                             <option value="Turkmenistan">Turkmenistan</option>
                             <option value="Turks and Caicos">Turks and Caicos Islands</option>
                             <option value="Tuvalu">Tuvalu</option>
                             <option value="Uganda">Uganda</option>
                             <option value="Ukraine">Ukraine</option>
                             <option value="United Arab Emirates">United Arab Emirates</option>
                             <option value="United Kingdom">United Kingdom</option>
                             <option value="United States">United States</option>
                             <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                             <option value="Uruguay">Uruguay</option>
                             <option value="Uzbekistan">Uzbekistan</option>
                             <option value="Vanuatu">Vanuatu</option>
                             <option value="Venezuela">Venezuela</option>
                             <option value="Vietnam">Viet Nam</option>
                             <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                             <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                             <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                             <option value="Western Sahara">Western Sahara</option>
                             <option value="Yemen">Yemen</option>
                             <option value="Yugoslavia">Yugoslavia</option>
                             <option value="Zambia">Zambia</option>
                             <option value="Zimbabwe">Zimbabwe</option>
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
                        <select id="palC" name="cityName"  class="form-control">
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
                        <input id="otherC" name="x"  type="text" class="form-control" value="{{ old('cityName') }}"
                         />
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
                <div class="col-12" style="margin-top:20px;">
                  <h4 class="greencolor">Your intrests</h4>
                  <hr />
                </div>
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
                      <br><br><br>

                               <div class="col-12" style="margin-top:20px;">
                  <h4 class="greencolor">Your Favorate Targets</h4>
                  <hr />
                </div>
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

                      <br />
                      <hr />
                      <br />
                        <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" class="btn btn-green btn-block">Register</button>
                            </div>
                        </div>

                    </form>
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
                                <input id="name" type="text" class="form-control"  value="{{ old('cityName') }}"
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
                            <div class="col-md-3 offset-md-4">
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
