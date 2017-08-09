@extends('layouts.master')

@section('content')
<div class="container min">
  <h1 class="mt-4 mb-3" style="color: var(--green);">Results <small></small></h1>

    <ul class="nav sw-nav-tabs" role="tablist" id ="nnnn">
      <li class="nav-item first-tab">
        <a class="nav-link  active" data-toggle="tab" id="ntab" href="#home" role="tab">Users</a>
      </li>
          <li class="nav-item second-tab">
        <a class="nav-link" data-toggle="tab" id="rtab" href="#Institute" role="tab">Institute</a>
      </li> 
      <form id="myform" class="row" style="" method="GET" action="{{route('basicSearch')}}">
          <div class="form-group col-sm12 col-md-4">
            <label for="location" >Country</label>

              <select name="location" class="form-control" onchange="yesnoCheck(this);">
               @include('includes.countriesModal')
            </select>

          </div>
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
         <input type="hidden" name="name" value="{{Request::input('name')}}">
  
         <div class="form-group  col-sm12 col-md-4">
           <label for="Select2">intrest</label>
           <select name="intrest[]" class="form-control selectpicker" id="Select2" data-actions-box="true"  data-live-search="true" multiple>

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

        </form>
         <div class="row justify-content-center">
          <div class="col-4">
          <button type="submit" form="myform" class="btn btn-block btn-green" >Search</button>
        </div>
      </div>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel">


        <!-- Blog Post -->
        <div class="row">

        @foreach($users as $result)
        <div class="col-lg-3 col-sm-4" style="margin-bottom:25px;">
            <div class="card h-100">
                        <a href="{{route('profile',[$result->user_id])}}">
                            <!--{$result->mainImgpath}}-->
                          <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$result->picture}}" alt="">
                      </a>
                        <div class="card-block">
                          <a href="{{route('profile',[$result->user_id])}}"><h2 class="card-title">{{$result->nameInEnglish}}</h2></a>
                    <p class="card-text">
                      Volunteer
                    </p>
                </div>
            </div>
        </div>

    @endforeach
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
                  {{ $users->setpath('filteredResults/')->appends(Request::except('page'))->links() }}

    </ul>
    </nav>
      </div>


        <div class="tab-pane" id="Institute" role="tabpanel">
          <div class="row">
                   <div class="col-12" style="color: #333">
                    <div class="row justify-content-center">
         

        @foreach($NGOs as $result)
        <div class="col-lg-3 col-sm-4" style="margin-bottom:25px;">
            <div class="card h-100">
                        <a href="{{route('profile',[$result->user_id])}}">
                            <!--{$result->mainImgpath}}-->
                          <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$result->picture}}" alt="">
                      </a>
                        <div class="card-block">
                          <a href="{{route('profile',[$result->user_id])}}"><h2 class="card-title">{{$result->nameInEnglish}}</h2></a>
                    <p class="card-text">
                      Institute
                   </p>
                </div>
            </div>
        </div>

    @endforeach






                          </div>
                          <br>

                <div class="row justify-content-center">
                  </div>
               </div>
                </div>



            <!-- Pagination -->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                  {{ $NGOs->setpath('filteredResults/')->appends(Request::except('page'))->links() }}


            </ul>
            </nav>


          </div>



    </div>



</div>

<!-- /.container -->

@endsection('content')