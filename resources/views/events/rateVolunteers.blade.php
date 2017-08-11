@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container-fluid "style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">
@include('events.includes.sidebar')
{{-- --}}
<div class="col-sm-12 col-md-8" >


  @if($mine && $archived == 1)
  <h3 class="greencolor ">Volunteers</h3>
  <hr />


      <form id="frm-unaccepted" action="{{route('rate',$event->id)}}" method="POST">{{ csrf_field() }}
      <div class="modal-body rate-modal">
        <label>cat1</label>
        <input type="text" name="cat1" class="cat1">
        <div id="r1" class="c"onclick="rate(1)"></div>
        <label>cat2</label>
        <input type="text" name="cat2" class="cat2">
        <div id="r2" class="c" onclick="rate(2)"></div>
        <label>cat3</label>
        <input type="text" name="cat3" class="cat3">
        <div id="r3" class="c" onclick="rate(3)"></div>
        <label>cat4</label>
        <input type="text" name="cat4" class="cat4">
        <div id="r4" class="c" onclick="rate(4)"></div>
      </div>


<hr />
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
      @if($eventAcceptedVol->rated == 0)
        <td>{{$eventAcceptedVol->id}}</td>
        <td><a href="{{route('profile',[$eventAcceptedVol->id])}}">{{$eventAcceptedVol->name}}</a></td>
      @endif
      </tr>
      @endforeach



  </tbody>
</table>
<div class="row justify-content-center" style="margin-top:20px;">


<div class="col-6">
  <button  type="submit" class="btn  btn-block btn-green">Rate</button>
</div>

</form>
</div>

@endif

{{-- --}}

              </div>


            </div>
          </div>
        </div>
@include('events.includes.reviewModal')

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
