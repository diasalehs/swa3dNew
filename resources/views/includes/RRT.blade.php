

  @if($mine)
  <h3 class="greencolor ">Volunteers</h3>
  <hr />


@if($archived == 1)
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

@endif

@if($archived == 0)
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


@if($archived == 0)
<div class="col-6">
  <button  type="submit" class="btn  btn-block btn-green">Remove</button>
</div>
@endif
@if($archived == 1)
<div class="col-6">
  <button  type="submit" class="btn  btn-block btn-green">Rate</button>
</div>
@endif

</form>
</div>

@endif
