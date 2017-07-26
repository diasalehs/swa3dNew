@extends('layouts.master')

@section('content')


<div class="container min" style="margin:30px auto; padding:5px;">

  @if(Auth::guest())

    <div class="row">
      <h1 class="pinkcolor col-md-12 col-sm-12">UpComing Events</h1>

         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">

          @foreach($events as $event)
          <div class="col-md-6 col-sm-12">
       <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h4 class="card-title line-clamp-2">{{$event->title}}</h4>
                  <div class="card-bottom">
                    <p class="card-text "><small>{{$event->startDate}} To {{$event->endDate}} - in Nablus</small></p>
                    <a href="{{route('event',$event->id)}}" class="btn btn-green" >View</a>
                    <a href="{{route('login')}}" class="btn btn-pink">Volunteer</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

              </div>

         </div>

    </div>
    <div class="row justify-content-center" style="margin-top:40px;">

    {{$events->links('vendor.pagination.custom')}}

  </div>

    @endif

@if(Auth::check())

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active" data-toggle="tab" href="#messages" role="tab">Events All Over / Search</a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " data-toggle="tab" href="#home" role="tab">Events in your counrty</a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Events matches your intrests</a>
  </li>


</ul>
<div class="tab-content">
  <div class="tab-pane active" id="messages" role="tabpanel">
    <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" class="green-link" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Advance Search
        </a>
      </h5>
    </div>
    <div id="collapseOne" class="collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block" class="">
        <form id="myform" class="" style="">
          <div class="row">

          <div class="form-group col-sm12 col-md-4">
            <label for="location" >Country</label>
  <select name="location" class="form-control" onchange="yesnoCheck(this);">
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



            </select>          </div>
          <div class="form-group col-sm12 col-md-4">

          <label for="Select1" style="align-self: flex-start;">target</label>
           <select name="target[]"class="form-control selectpicker" id="Select1"data-actions-box="true" data-size="5"  data-live-search="true"multiple>
             <option value="1">Pre-School Children (< 5)</option>
             <option value="2">Elementary School Children (5-11)</option>
             <option value="3">Middle School Children (11-14)</option>
             <option value="4">High School Children (14-18)</option>
             <option value="5">Young Adults (18-30)</option>
             <option value="6">Adults (31-59)</option>
             <option value="7">Elderly (60 >)</option>

           </select>
         </div>

         <div class="form-group  col-sm12 col-md-4">
           <label for="Select2">intrest</label>
           <select name="intrest[]" class="form-control selectpicker" id="Select2" data-actions-box="true"
               data-live-search="true" multiple>

             <option value="1">Social and Economic Rights</option>
             <option value="2">Legal Aid</option>
             <option value="3">Capacity Building</option>
             <option value="4">Stop the Wall Campaign</option>
             <option value="5">Legal Aid</option>
             <option value="6">BSD Campaign</option>
             <option value="7">Regional Campaigns</option>
             <option value="8">Research</option>
             <option value="9">Administration</option>
             <option value="10">Culture and the Arts</option>
             <option value="11">Environment and Agriculture</option>
             <option value="12">Education</option>
             <option value="13">Youth and Children</option>
             <option value="14">Goverance, Democracy and Human Rights</option>
             <option value="15">Development</option>
             <option value="16">Law</option>
             <option value="17">Women</option>
             <option value="18">People with Disablities</option>
             <option value="18">Health</option>
           </select>
         </div>
       </div>

         <div class="row justify-content-center">
           <div class="col-4">
           <button type="submit" form="myform" class="btn btn-block btn-green" >Search</button>
         </div>
         </div>
        </form>


      </div>
    </div>
</div>
</div>

    <div class="row">
             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">
              @foreach($events as $event)
              <div class="col-md-6 col-sm-12">

                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h4 class="card-title line-clamp-2">{{$event->title}}</h4>

                      <div class="card-bottom">
                        <p class="card-text" style=""><small>{{$event->startDate}} To {{$event->endDate}} - in Nablus</small></p>

                      <a href='event/{{$event->id}}' class="btn btn-green event-btn" >View</a>

                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->user_id == $user->id && $event->id == $volEvent->event_id && $flag == 0)
                              <a href="{{route('disVolunteer',[$event->id])}}" class="btn btn-pink">Cancel Volunteer Request</a>
                              <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$event->id])}}" class="btn btn-pink">Volunteer Request</a>
                        @endif
                      @endif
                    </div>

                    </div>
                  </div>
                </div>


                @endforeach

                  </div>
                  <br>

                  {{ $events->setpath('upComingEvents/')->appends(Request::except('page'))->links() }}



                 <div class="row justify-content-center">
                <form action="{{route('allEvents')}}" method="GET">
                  <button class="btn btn-green">View more</button></form>
                  </div>
             </div>
        </div>
    </div>

  <div class="tab-pane" id="home" role="tabpanel">
            <div class="row">
             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">

              @foreach($localevents as $event)
              <div class="col-md-6 col-sm-12">
                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h3 class="card-title">{{$event->title}}</h3>
                      <div class="card-bottom">
                      <p class=""><small>{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</small></p>

                      <a href='event/{{$event->id}}' class="btn btn-green" >View</a>

                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->individual_id == $user->individuals->id && $event->id == $volEvent->event_id && $flag == 0)
                              <a href="{{route('disVolunteer',[$event->id])}}" class="btn btn-pink">Cancel Volunteer Request</a>
                              <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$event->id])}}" class="btn btn-pink">Volunteer Request</a>
                        @endif
                      @endif
                    </div>

                    </div>
                  </div>
                </div>

                @endforeach
                <br>

                </div>
                  <div class="row justify-content-center">
                    <form class="" action="{{route('allLocal')}}" method="GET">
                        <button class="btn btn-pink" >View more</button>
                    </form>
                  </div>
             </div>
        </div>
    </div>
  <div class="tab-pane" id="profile" role="tabpanel">
    <div class="row">

             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">
                @foreach($userevent as $eve)
                   <div class="col-md-6 col-sm-12">
                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$eve->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h3 class="card-title">{{$eve->title}}</h3>
                      <p class="card-text line-clamp-4">{{$eve->description}}</p>
                      <p class="">{{$eve->startDate}} To {{$eve->endDate}} - in {{$eve->city}}</p>
                      <a href='event/{{$eve->id}}' class="card-link green-link" >View</a>
                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->event_id == $eve->id)
                            <a href="{{route('disVolunteer',[$eve->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                            <?php $flag = 1; ?>
                          @elseif($flag == 0)
                            <a href="{{route('volunteer',[$eve->id])}}" class="card-link pink-link">Volunteer Request</a>
                            <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$eve->id])}}" class="card-link pink-link">Volunteer Request</a>
                        @endif
                      @endif
                    </div>
                  </div>
               </div>

                @endforeach


                  </div>
                  <br>
                  {{-- needs to be routed to  an allmatched page  --}}
                  <div class="row justify-content-center" >
                  <form action="{{route('allLocal')}}" method="GET"><button class="btn btn-yellow">View more</button></form>
                    </div>
             </div>

        </div>

  </div>



  </div>
  @endif

</div>

@endsection('content')
@section('scripts')


<script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
@endsection
