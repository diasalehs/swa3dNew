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
                      <div class="row">

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


                        {{--  --}}
                         <div class="  col-sm-12 col-md-6 form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                             <label for="email" class=" form-control-label">First Name</label>
                             <div class="">
                                <input id="name" type="text" class="form-control" name="firstName" value="{{$userIndividual->firstName }}"
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
                                <input id="name" type="text" class="form-control" name="lastName" value="{{ $userIndividual->lastName }}"
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
                                <input id="name" type="text" class="form-control" name="ARfirst" value="{{  $userIndividual->ARfirst }}"
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
                                <input id="name" type="text" class="form-control" name="ARlast" value="{{  $userIndividual->ARlast }}"
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
                              <select name="country" class="form-control" onchange="yesnoCheck(this);">
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia, Plurinational State of</option>
                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Côte d'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curaçao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS" selected>Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Réunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands, British</option>
                                    <option value="VI">Virgin Islands, U.S.</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
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
                      <div class="form-group">
                            <label  class="col-lg-4 form-control-label" for="exampleSelect1">Major Education Level</label>
                         <div class="col-lg-6">
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



{{--  --}}
{{--  --}}

@endsection('content')
