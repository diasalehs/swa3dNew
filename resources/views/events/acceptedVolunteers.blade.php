@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container-fluid min"style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">
@include('events.includes.sidebar')
{{-- --}}

    <div class="col-sm-12 col-md-8" >


  <h3 class="greencolor ">Volunteers</h3>
  <hr />

@if($archived == 0 && $mine)
<form id="frm-unaccepted" action="{{ route('unAcceptVolunteer',$event->id)}}" method="POST" >{{ csrf_field() }}
@endif
<table id="unacceptedT" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>
      <tr>
          <th>

          </th>
          <th>Name</th>

      </tr>
  </thead>
  <tbody>
    @foreach($eventAcceptedVols as $eventAcceptedVol)

      <tr>
        <td>{{$eventAcceptedVol->id}}</td>
        <td><a href="{{route('profile',[$eventAcceptedVol->id])}}">{{$eventAcceptedVol->name}}</a></td>
      </tr>
      @endforeach



  </tbody>
</table>
<div class="row" style="margin-top:20px;">


@if($archived == 0 && $mine)
<div class="col-6">
  <button  type="submit" class="btn  btn-block btn-green">Remove</button>
</div>
</form>

@endif

</div>



{{-- --}}

              </div>


            </div>
          </div>
        </div>
@include('events.includes.postModal')
@include('events.includes.reviewModal')
@include('events.includes.rateModal')

@endsection('content')
@section('scripts')

    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

    <script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>

    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.9/js/dataTables.checkboxes.min.js"></script>

    <script src="{{URL::asset('vendor/js/event.js')}} "></script>


@endsection
