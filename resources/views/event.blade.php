@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">

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
        <p class=""style="color:#fff; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}}: {{$event->city}}   <br />   Created by: <a href="{{route('profile',$event->user_id)}}" class="yellow-link">{{$event->user->name}}</a></p>




@if(Auth::guest() && $event->endDate > $date)
<a href="{{route('login')}}" class="btn btn-pink ">Volunteer</a>
</div>

</div>
</div>

      <div class="container "style="margin-bottom:50px;margin-top:30px;">
        <div class="row justify-content-center">
          <div class="col-sm-12 col-md-8" >
            <div class="card">
              <div class="card-header">
                Details
              </div>
              <div class="card-block">
                <p class=" card-text"style="text-align:justify;">{{$event->description}}</p>
                <p class=""style="text-align:center; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}} | Created by: <a href="{{route('profile',$event->user_id)}}" class="pink-link">{{$event->user->name}}</a></p>
              </div>

            </div>
          </div>
          <div class="col-sm-12 col-md-8">

          <div class="card card-outline-warning mb-3 text-center" style="border-color: var(--green); margin-top:30px;">
            <div class="card-block">
              <blockquote class="card-blockquote">
                <p>                    You should login to see more.</p>
              </blockquote>
              <a href="{{route('login')}}" class="btn btn-green ">Login to see more</a>

            </div>
          </div>
        </div>


          </div>
        </div>
    </div>

@elseif(Auth::check() )
                @if($archived == 0 || $archived == 2)
                  @if($user->userType == 0 || ($user->userType == 3 && !$mine))
                      @if($request)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="btn btn-pink">Cancel Volunteer Request</a>
                      @elseif(!$request)
                        <a href="{{route('volunteer',[$event->id])}}" class="btn btn-pink">Volunteer Request</a>
                      @endif
                  @endif
                  @if($mine)
                    @if($archived == 0)
                        <a class="btn btn-pink" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                        <a class=" btn btn-yellow" href="{{route('eventEdit',[$event->id])}}">Edit</a>
                    @endif
                    <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal">Create a Post</a>
                  @endif
                @endif

                @if(($mine || $eventCloseAllowed) && $archived == 1)
                  <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                @endif

                @if($mine)
                  @if($event->open)
                    <a class="btn btn-danger"  href="{{route('closeEvent',$event->id)}}">close</a>
                  @elseif(!$event->open)
                    <a class="btn btn-danger"  href="{{route('openEvent',$event->id)}}">open</a>
                  @endif
                @endif
</div>
</div>
</div>
<div class="container "style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">
    <div class="col-sm-12 col-md-8" >
      <div class="card">
        <div class="card-header">
          Details
        </div>
        <div class="card-block">
          <p class=" card-text"style="text-align:justify;">{{$event->description}}</p>
          <p class=""style="text-align:center; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}} | Created by: <a href="{{route('profile',$event->user_id)}}" class="green-link">{{$event->user->name}}</a></p>

        </div>

      </div>

              @if($event->open || $eventCloseAllowed || $mine)
                <h3 class="greencolor " style="margin-top:30px;">Event Posts</h3>
                <hr />
              @foreach($posts as $post)
                  <div class="card" style="margin-bottom:20px;">
                    <div class="card-block">
                      <h4 class="card-title greencolor" >{{$post->body}}</h4>
                        {{$post->created_at}}
                    </div>
                  </div>
              @endforeach

              @if($archived == 1)
                  <h3 class="greencolor " style="margin-top:30px;">Event Reviews</h3>
                <hr />
                @foreach($lessons as $lesson)
                    <div class="card" style="margin-bottom:20px;">
                      <div class="card-block">
                        <h4 class="card-title greencolor" ><a href="{{route('profile',$lesson->user_id)}}">{{$lesson->name}}</a></h4>
                        <h5 class="card-title greencolor" >{{$lesson->positive}}</h4>
                        <h5 class="card-title greencolor" >{{$lesson->negative}}</h4>
                          {{$lesson->created_at}}
                      </div>
                    </div>
                @endforeach
              @endif


    </div>
        @if($mine)
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
          <div class=" col-lg-4">

          @if($mine && $event->endDate > $date)
            <h3 class="greencolor ">Volunteers request</h3>
            <hr />
            <form style="text-align:center" role="form" method="POST" action="{{ route('acceptVolunteer',$event->id)}}">{{ csrf_field() }}
              <div class="row" style=" margin-bottom:20px;">

              <select class="selectpicker col-9" name="accepted[]"data-selected-text-format="count" multiple data-actions-box="true" data-size="7" data-live-search="true" >
                @foreach($eventVols as $eventVol)
                <option value="{{$eventVol->id}}"  data-subtext="email"><a href="{{route('profile',[$eventVol->id])}}">{{$eventVol->name}}</a></option>
                @endforeach
              </select>
              <button  type="submit" class="btn col-3 btn-green">Accept</button>
            </div>

            </form>
            @endif

            <h3 class="greencolor " >Volunteers</h3>

            <hr />
            <form role="form" method="POST" action="{{ route('unAcceptVolunteer',$event->id)}}">{{ csrf_field() }}
              <div class="row" style=" margin-bottom:20px;">

              <select name="unaccepted[]" class="selectpicker col-9" style="width:100%;" multiple
              @if($mine && $event->endDate > $date)
               data-actions-box="true"
               @endif
               data-size="7" data-live-search="true" >
                @foreach($eventAcceptedVols as $eventAcceptedVol)
                <option value="{{$eventAcceptedVol->id}}"><a href="{{route('profile',[$eventAcceptedVol->id])}}">{{$eventAcceptedVol->name}}</a></option>
                @endforeach
              </select>
              @if($mine && $event->endDate > $date)
              <button type="submit" class="btn col-3 btn-pink">Remove</button>
              @endif
            </div>

            </form>


          </div>
      </div>
        @endif
@endif

@include('includes.reviewModal')

@endsection('content')
