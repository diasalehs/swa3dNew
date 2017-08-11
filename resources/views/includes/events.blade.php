    <div class="row">


         <div class="col-12" style="color: #333">
           @if(count($events)==0)
               <h4 class="greencolor">
                 No events
               </h4>
           @endif
          <div class="row justify-content-center">

          @foreach($events as $event)

                        <?php
                          $volunteer = 0;
                          $mine = 0;
                          if(Auth::check())
                          {
                            if($event->user_id == Auth::user()->id){$mine = 1;}
                          }
                        ?>
                        @if($eventsVolunteeredAt)
                          @foreach($eventsVolunteeredAt as $eventVolunteeredAt)
                            @if($eventVolunteeredAt->event_id == $event->id )
                              <?php $volunteer = 1; ?>
                            @endif
                          @endforeach
                        @endif

          <div class="col-md-6 col-sm-12">
       <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h4 class="card-title line-clamp-2">{{$event->title}}</h4>
                  <div class="card-bottom">
                    <p class="card-text "><small>{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}}</small></p>
                    <a href="{{route('event',$event->id)}}" class="btn btn-green" >View</a>
                    @if($event->startDate > date('Y-m-d'))
                      @if($mine)
                        <a class="btn btn-pink" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                        <a class=" btn btn-yellow" href="{{route('eventEdit',[$event->id])}}">Edit</a>
                      @else
                        @if($volunteer)
                          <a href="{{route('disVolunteer',$event->id)}}" class="btn btn-pink">Cancel Volunteer Request</a>
                        @elseif(!$volunteer)
                          <a href="{{route('volunteer',$event->id)}}" class="btn btn-pink">Volunteer Request</a>
                        @endif
                      @endif
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
              </div>
         </div>

    </div>

  {{--  <div class="row justify-content-center" style="margin-top:40px;">

    {{$events->links('vendor.pagination.custom')}}

  </div> --}}
