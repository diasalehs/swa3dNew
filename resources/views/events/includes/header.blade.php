
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
        <h1 class="display-7 " style="color:#fff">{{$event->title}}</h1>
        <p class=""style="color:#fff; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{ucfirst($event->city)}}, {{$event->country}}  <br />   Created by: <a href="{{route('profile',$event->user_id)}}" class="yellow-link">{{$event->user->name}}</a></p>

                @if($archived == 0)
                  @if($mine)
                    <a class="btn btn-pink" href="{{route('eventDelete',$event->id)}}">Delete</a>
                    <a class=" btn btn-yellow" href="{{route('eventEdit',$event->id)}}">Edit</a>
                    @if($event->open)
                      <a class="btn btn-danger"  href="{{route('closeEvent',$event->id)}}">close</a>
                    @elseif(!$event->open)
                      <a class="btn btn-danger"  href="{{route('openEvent',$event->id)}}">open</a>
                    @endif
                  @else
                    @if($request)
                      <a href="{{route('disVolunteer',$event->id)}}" class="btn btn-pink">Cancel Volunteer Request</a>
                    @elseif(!$request)
                      <a href="{{route('volunteer',$event->id)}}" class="btn btn-pink">Volunteer Request</a>
                    @endif
                  @endif
                  @if($mine || $eventCloseAllowed)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal">Create a Post</a>
                  @endif
                @elseif($archived == 1)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                  @if(!$mine && $eventCloseAllowed)
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rate-modal">Rate!</button>
                  @endif
                @endif

</div>
</div>
</div>
