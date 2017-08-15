@extends('layouts.master')

@section('content')
<div class="container-fluid min" style="margin-top:40px;">


  <div class="row justify-content-center">

    <form method="get" class="col-sm-12 col-md-6" action="{{route('search')}}" role="form" id="form-buscar">
      <div class="form-group" >
        <div class="input-group">
          <input id="1" class="form-control" type="text" name="name" placeholder="Search..." style="    border-color: var(--green) !important;
" required/>
          <span class="input-group-btn">
            <button class="btn btn-green" style="  outline: 0 !important;
 border-top-left-radius:0px!important;border-bottom-left-radius:0px!important;" type="submit">
            <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
            </button>
          </span>
        </div>
      </div>
    </form>
  </div>
      <hr />

<div class="row">

       <div class="col-12" style="color: #333">

        <div class="row justify-content-center">


<table id="example" class="  table table-striped table-bordered table-responsive" cellspacing="0"  width="100%">
  <thead>

      <tr>
          <th>English name</th>
          <th>Arabic name</th>
          <th>Country</th>
          <th>City</th>
          <th>Age</th>
          <th>Gender</th>

      </tr>
  </thead>
  <tfoot>

      <tr>
          <th class="TFN">English name</th>
          <th>Arabic name</th>
          <th>Country</th>
          <th>City</th>
          <th>Age</th>
          <th>Gender</th>

      </tr>
  </tfoot>
  <tbody>
@foreach($users as $u)

<tr>
          <td><a class="green-link" href="{{URL::to('/')}}/profile/{{$u->id}}">{{$u->nameInEnglish}}</a></td>
          <td>{{$u->nameInArabic}}</td>
          <td>{{$u->country}}</td>
          <td>{{$u->cityName}}</td>
          <td>{{$u->dateOfBirth}}</td>
          <td>{{ $u->gender}}</td>
</tr>
@endforeach




  </tbody>
</table>
</div>
</div>
</div>
</div>



<!-- /.container -->

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
