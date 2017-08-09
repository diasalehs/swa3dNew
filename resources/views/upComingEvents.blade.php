@extends('layouts.master')

@section('content')


<div class="container min" style="margin:30px auto; padding:5px;">

  @if(Auth::guest())

<h1 class="pinkcolor col-md-12 col-sm-12">UpComing Events</h1>
@include('includes.events')


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
            @include('includes.countriesModal')
            </select>          </div>
          <div class="form-group col-sm12 col-md-4">

          <label for="Select1" style="align-self: flex-start;">target</label>
           <select name="target[]" class="form-control selectpicker" id="Select1"data-actions-box="true" data-size="5"  data-live-search="true" multiple>
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


                @include('includes.events')

                  <br>
                 <div class="row justify-content-center">
                <form action="{{route('allEvents',['events'=>1])}}" method="GET">
                  <button class="btn btn-green">View more</button></form>
                  </div>

    </div>

  <div class="tab-pane" id="home" role="tabpanel">

<?php $events = $localevents; ?>
@include('includes.events')

                  <br>
                  <div class="row justify-content-center">
                    <form class="" action="{{route('allEvents',['events'=>2])}}" method="GET">
                        <button class="btn btn-pink" >View more</button>
                    </form>
                  </div>
    </div>


  <div class="tab-pane" id="profile" role="tabpanel">
                <?php $events = $userevent; ?>
                @include('includes.events')
                  <br>
                  {{-- needs to be routed to  an allmatched page  --}}
                  <div class="row justify-content-center" >
                  <form action="{{route('allEvents',['events'=>3])}}" method="GET"><button class="btn btn-yellow">View more</button></form>
                    </div>
  </div>



  </div>
  @endif

</div>

@endsection('content')

@section('scripts')


    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>

@endsection
