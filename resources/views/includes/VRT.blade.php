

  @if($mine && ($archived == 0 || $archived == 2))
  <h3 class="greencolor ">Volunteers request</h3>
  <hr />

<form id="frm-example" action="{{ route('acceptVolunteer',$event->id)}}" method="POST" >{{ csrf_field() }}

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
        <td>{{$eventVol->name}}</td>

      </tr>
      @endforeach



  </tbody>
</table>
<button  type="submit" class="btn col-3 btn-green">Accept</button>
</form>
@endif
