@extends('layouts.master')

@section('content')
<div class="container" style="margin-bottom:20px;">
  <h1 class="mt-4 mb-3" style="color: var(--green);">Institutes<small></small></h1>

      <form id="myform" class="row" style="" method="GET" action="{{route('institutes')}}">
          <div class="form-group  col-sm12 col-md-3">
            <label for="location" >Country</label>

              <select name="location" class="form-control" onchange="yesnoCheck(this);">
               @include('includes.countriesModal')
            </select>

          </div>
          <div class="form-group  col-sm12 col-md-3">

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

         <div class="form-group  col-sm12 col-md-3">
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
         <div class="form-group  col-sm12 col-md-3">
           <label for="Select2" style="opacity:0">submit</label>

         <button type="submit" form="myform" class="btn btn-block btn-green" >Search</button>
        </div>
        </form>


    <!-- Tab panes -->
<hr />

                    <div class="row justify-content-center">

<table id="example" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>

      <tr>
<th></th>
          <th>English Name</th>
          <th>Arabic Name</th>
          <th>Rating</th>
          <th>City</th>
          <th>Address</th>
          <th>Email</th>

      </tr>
  </thead>

  <tbody>
@foreach($NGOs as $u)
<tr>
          <td>{{$u->user_id}}</td>
          <td><a href="{{route('profile',[$u->user_id])}}">{{$u->nameInEnglish}}</a></td>
          <td>{{$u->nameInArabic}}</td>
          <td>{{$u->acc_avg}}  </td>
          <td>{{$u->cityName}}</td>
          <td>{{$u->address}}</td>
          <td>{{$u->email}}</td>
      </tr>
@endforeach




  </tbody>
</table>


<br />



    </div>



</div>

<!-- /.container -->

@endsection('content')

@section('scripts')

    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

    <script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>

    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>

    <script src="{{URL::asset('vendor/js/eventAcc.js')}} "></script>


@endsection
