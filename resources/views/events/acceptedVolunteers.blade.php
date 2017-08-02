@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container "style="margin-bottom:50px;margin-top:30px;">
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
      @if($eventAcceptedVol->rated == 0)
        <td>{{$eventAcceptedVol->id}}</td>
        <td><a href="{{route('profile',[$eventAcceptedVol->id])}}">{{$eventAcceptedVol->name}}</a></td>
      @endif
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
        @if($mine || $eventCloseAllowed)
        @if($archived == 0 || $archived == 2)

        <div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create a Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="" role="form" method="POST" action="{{ route('post') }}">{{ csrf_field() }}
                  <div class="">
                    <input id="name" type="text" style="display: none;" class="form-control" name="event_id" value="{{ $event->id }}"/>
                  </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="title" class="col-lg-4 form-control-label">Post Body</label>
                        <div class="col-lg-12">
                            <textarea class="form-control" required="required" name="body" id="body">{{ old('body') }}</textarea>
                            @if ($errors->has('body'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Warning!</strong> {{ $errors->first('body') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-green ">post</button>
              </div>
            </form>

            </div>
          </div>
        </div>
        @endif
          @endif


@include('includes.reviewModal')


@if((!$mine || $eventCloseAllowed) && $archived == 1)
<!-- Modal -->
<div class="modal fade" id="rate-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('rateInstitute',$event->id)}}" method="get">
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-green">Save</button>
        </div>
        </form>
        </div>
        </div>
        </div>


@endif

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
