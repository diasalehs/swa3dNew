@extends('institute/layouts.profileMaster')

@section('content')



<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')

      <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">

            <form id="myform" class="" style="" method="GET" action="{{route('volunteersSearch')}}">
              <div class="row">

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
        <hr />


<form id="frm-invite" method="post" action="{{route('invite')}}" >{{ csrf_field() }}

<table id="inviteT" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>

      <tr>
<th></th>
          <th>English Name</th>
          <th>Arabic Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>City</th>
          <th>Volutery Experience</th>
          <th>Education</th>

      </tr>
  </thead>

  <tbody>
@foreach($users_record as $u )
<tr>
          <td>{{$u->user_id}}</td>
          <td>{{$u->nameInEnglish}}</td>
          <td>{{$u->nameInArabic}}</td>
          <td>
           <?php
               $time = date_create($u->dateOfBirth);
               echo date("Y")-date_format($time, 'Y');
           ?>
          </td>
          <td>{{$u->gender}}</td>
          <td>{{$u->cityName}}</td>
          <td>{{$u->voluntaryYears}}</td>
          <td>{{$u->educationalLevel}}</td>
      </tr>
@endforeach




  </tbody>
</table>


<br />


@include('includes/inviteToEvent')

</form>
      </div>
    </div>
</div></div>

@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/fh-3.1.2/r-2.1.1/se-1.2.2/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>
<script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>

<script type="text/javascript">

$(document).ready(function() {
   var table = $('#inviteT').DataTable({
      'columnDefs': [
         {
            'targets': 0,
            'render': function(data, type, row, meta){
                   if(type === 'display'){
                      data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                   }

                   return data;
                },
            'checkboxes': {
               'selectRow': true,
               'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'

            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']]
   });

   // Handle form submission event
   $('#frm-invite').on('submit', function(e){
      var form = this;

      var rows_selected = table.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'invited[]')
                .val(rowId)
         );
      });


   });
});


</script>

@endsection
