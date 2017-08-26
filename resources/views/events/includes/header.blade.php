
  <div class="jumbotron jumbotron-fluid " style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)) , url({{URL::to('/')}}/events/{{$event->cover}});
  background-size:cover;background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
  min-height:500px;
  display: -ms-flexbox;
display: -webkit-flex;
display: flex;

-ms-flex-align: center;
-webkit-align-items: center;
-webkit-box-align: center;

align-items: center;
  ">
    <div class="container" style="  min-height:300px;     display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;" >

      <div class="" style="	display: -ms-flexbox;
	display: -webkit-flex;
	display: flex;

	-ms-flex-align: center;
	-webkit-align-items: center;
	-webkit-box-align: center;

  align-content: space-around;
  flex-direction:column">
        <h4 class="display-7 event-title " style="color:#fff">{{$event->title}} <small style="font-size:16px;"></small></h4>
        <p class=""style="color:#fff; font-size: 19px;margin-bottom:20px; margin-top:40px">{{$event->startDate}} To
          {{$event->endDate}} - in {{ucfirst($event->city)}}, {{$event->country}} |
          @if(!$event->open)
             (<i class="fa fa-user-secret" aria-hidden="true"></i> Private Event).
               @if($mine)
                <a class="  green-link"  href="{{route('openEvent',$event->id)}}">
                  Make it public</a>
                  @endif

          @elseif($event->open)
            (<i class="fa fa-users" aria-hidden="true"></i> Public Event).
              @if($mine)
            <a class="  pink-link"  href="{{route('closeEvent',$event->id)}}">
               Make it private</a>
               @endif

          @endif
           <br />   Created by <a href="{{route('profile',$event->user_id)}}" class="yellow-link">{{$event->user->name}}</a>


         </p>
         <p>

         </p>
        <div >

                @if($archived == 0)
                  @if($mine)

                    <button type="button"  class="btn addpadding btn-pink"  data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    <a class=" btn btn-yellow" href="{{route('eventEdit',$event->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>

                  @else
                    @if($request)
                      <a href="{{route('disVolunteer',$event->id)}}" class="btn addpadding btn-yellow"><i class="fa fa-chain-broken" aria-hidden="true"></i> Cancel Volunteer Request</a>
                    @elseif(!$request)
                      <a href="{{route('volunteer',$event->id)}}" class="btn addpadding btn-pink"><i class="fa fa-handshake-o" aria-hidden="true"></i> Volunteer Request</a>
                    @endif
                  @endif
                  @if($mine || $eventCloseAllowed)
                  <a class="btn addpadding btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal"><i class="fa fa-plus" aria-hidden="true"></i> Write Post</a>
                  @endif
                @elseif($archived == 1)
                  <a class="btn addpadding btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                  @if(!$mine && $eventCloseAllowed)
                  <button type="button" class="btn addpadding btn-yellow" data-toggle="modal" data-target="#rate-modal">Rate!</button>
                  @endif
                @endif
              </div>


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
