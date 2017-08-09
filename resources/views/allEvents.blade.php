@extends('layouts.master')

@section('content')

@if(Auth::check())
<div class="container-fluid min"  >

          <h1 class="pinkcolor col-md-8 col-sm-12 " style="margin-top:20px;">Events</h1>
          <hr />

         <form id="myform"  action="{{route('Events')}}" class="" style="">
          <div class="row">

          <div class="form-group col-sm12 col-md-4">
            <label for="location" >Country</label>
           <select name="location" class="form-control" onchange="yesnoCheck(this);">
            <option value="Afghanistan">Afghanistan</option>
               @include('includes.countriesModal')

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
<div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">



<table id="example" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>

      <tr><th></th>
          <th>Name</th>
          <th>city</th>
          <th>Description</th>
          <th>Start date</th>
          <th>End Date</th>
          <th>status</th>

      </tr>
  </thead>

  <tbody>
@foreach($events as $u)

<tr>    <td></td>
          <td><a href="{{URL::to('/')}}/event/{{$u->id}}">{{$u->title}}</a></td>
          <td>{{$u->city}}</td>
          <td>{{$u->description}}</td>
          <td>{{$u->startDate}}</td>
          <td>{{$u->endDate}}</td>
          <td>@if($u->open==1)open
              @else closed
              @endif
          </td>
</tr>
@endforeach




  </tbody>
</table>


         </div>


    </div>
</div>
</div>

@endif

@endsection('content')
@section('scripts')


    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>
    <script>
            $(document).ready(function() {
            $('#example').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.data().unique().sort().each( function ( d, j ) {
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );

    </script>
@endsection
