
  <div class="jumbotron jumbotron-fluid " style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)) , url({{URL::to('/')}}/events/{{$event->cover}});
  background-size:cover;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container" style="  min-height:300px;     display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;" >

      <div class="">
        <h4 class="display-7 event-title " style="color:#fff">{{$event->title}} <small style="font-size:16px;"></small></h4>
        <p class=""style="color:#fff; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{ucfirst($event->city)}}, {{$event->country}}  <br />   Created by <a href="{{route('profile',$event->user_id)}}" class="yellow-link">{{$event->user->name}}</a></p>

                @if($archived == 0)
                  @if($mine)
                    <button type="button"  class="btn btn-pink"  data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    <a class=" btn btn-yellow" href="{{route('eventEdit',$event->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                    @if($event->open)
                      <a class="btn btn-danger"  href="{{route('closeEvent',$event->id)}}">make it private</a>
                    @elseif(!$event->open)
                      <a class="btn btn-danger"  href="{{route('openEvent',$event->id)}}">make it public</a>
                    @endif
                  @else
                    @if($request)
                      <a href="{{route('disVolunteer',$event->id)}}" class="btn btn-yellow"><i class="fa fa-chain-broken" aria-hidden="true"></i> Cancel Volunteer Request</a>
                    @elseif(!$request)
                      <a href="{{route('volunteer',$event->id)}}" class="btn btn-pink"><i class="fa fa-handshake-o" aria-hidden="true"></i> Volunteer Request</a>
                    @endif
                  @endif
                  @if($mine || $eventCloseAllowed)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal"><i class="fa fa-plus" aria-hidden="true"></i> Create a Post</a>
                  @endif
                @elseif($archived == 1)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                  @if(!$mine && $eventCloseAllowed)
                  <button type="button" class="btn btn-yellow" data-toggle="modal" data-target="#rate-modal">Rate!</button>
                  @endif
                @endif

</div>
</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete  confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Event?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a  class="btn btn-pink" href="{{route('eventDelete',$event->id)}}"><i class="fa fa-trash-o" aria-hidden="true"></i>  Yes, Delete</a>
      </div>
    </div>
  </div>
</div>
