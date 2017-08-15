@extends('layouts.master')
@section('title')
Swa3ed - Accept Volunteers 
@endsection
@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container-fluid min"style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">
@include('events.includes.sidebar')
{{-- --}}

    <div class="col-sm-12 col-md-8" >

  <h3 class="greencolor ">Volunteers </h3>
  <hr />

@if($mine && ($archived == 0 || $archived == 2))
<form id="frm-example" action="{{ route('acceptVolunteer',$event->id)}}" method="POST" >{{ csrf_field() }}

@endif
<table id="example" class=" table table-striped table-bordered" cellspacing="0"  width="100%">
  <thead>
      <tr>
          <th>

          </th>
          <th>Name</th>

      </tr>
  </thead>
  <tbody>
    @foreach($eventVols as $eventVol)

      <tr>
        <td>{{$eventVol->id}}</td>
        <td><a href="{{route('profile',[$eventVol->id])}}"></a>{{$eventVol->name}}</td>

      </tr>
      @endforeach



  </tbody>
</table>

@if($mine && ($archived == 0 || $archived == 2))
<button  type="submit" class="btn col-3 btn-green">Accept</button>
</form>

@endif

{{-- --}}

              </div>


            </div>
          </div>
        </div>
@include('events.includes.postModal')

@endsection('content')
@section('scripts')

    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>
    <script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>
    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>
    <script src="{{URL::asset('vendor/js/jquery.dataTables.min.js')}} "></script>
    <script src="{{URL::asset('vendor/js/dataTables.bootstrap4.min.js')}} "></script>
    <script src="{{URL::asset('vendor/js/dataTables.checkboxes.min.js')}} "></script>
    <script src="{{URL::asset('vendor/js/eventAcc.js')}} "></script>


@endsection
