

  @if($mine && $event->endDate > $date)
  <h3 class="greencolor ">Volunteers</h3>
  <hr />

<form id="frm-unaccepted" action="{{ route('unAcceptVolunteer',$event->id)}}" method="POST" >{{ csrf_field() }}

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
        <td>{{$eventAcceptedVol->name}}</td>

      </tr>
      @endforeach



  </tbody>
</table>
<div class="row">
<div class="col-6">
  <button  type="submit" class="btn  btn-block btn-green">Remove</button>

</div>
<div class="col-6">
  <button  type="submit" class="btn btn-block btn-green">Rate</button>

</div>
</div>

</form>
@endif
