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
        <p class=""style="color:#fff; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}} | Created by: <a href="{{route('profile',$event->user_id)}}" class="pink-link">{{$event->user->name}}</a></p>


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

                <div style="text-align:center">
                  <a href="#" class="btn btn-green">Volunteer </a>
                </div>
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
                @if($event->endDate > $date)
                  @if($user->userType == 0)
                      @if($request)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="btn btn-pink">Cancel Volunteer Request</a>
                      @elseif(!$request)
                        <a href="{{route('volunteer',[$event->id])}}" class="btn btn-pink">Volunteer Request</a>
                      @endif
                  @elseif($mine && $archived == 0)
                    <a class="btn btn-pink" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                    <a class=" btn btn-yellow" href="{{route('eventEdit',[$event->id])}}">Edit</a>
                    <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#postModal">Create a Post</a>
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

          <div class=" col-lg-4">
            <h3 class="greencolor ">Volunteers in this event</h3>
            <hr />
            <form>
              <select class="selectpicker" multiple data-actions-box="true" data-live-search="true" >
                @foreach($eventVols as $eventVol)

                <option>{{$eventVol->nameInEnglish}}</option>

                @endforeach

              </select>
              <button type="submit" class="btn btn-green">Accept</button>
            </form>


            <div class="list-group" style="color: var(--navy);">
            @foreach($eventVols as $eventVol)
              <button type="button" class="list-group-item list-group-item-action"><a href="{{route('profile',[$eventVol->user_id])}}">{{$eventVol->nameInEnglish}}</a><pre>            </pre><a class="btn btn-primary btn-sm" href="{{route('acceptVolunteer',['volunteerId'=>$eventVol->id , 'eventId' => $event->id])}}">Accept</a></button>
            @endforeach
            </div>
            <h3 class="greencolor ">Accepted Volunteers</h3>
            <hr />
            <form>
              <select class="selectpicker" multiple data-actions-box="true" data-live-search="true" >
                @foreach($eventAcceptedVols as $eventAcceptedVol)

                <option>{{$eventAcceptedVol->nameInEnglish}}</option>

                @endforeach

              </select>
              @if($mine && $event->endDate > $date)

              <button type="submit" class="btn btn-pink">Remove</button>
              @endif

            </form>
            <div class="list-group" style="color: var(--navy);">
            @foreach($eventAcceptedVols as $eventAcceptedVol)
              <button type="button" class="list-group-item list-group-item-action"><a href="{{route('profile',[$eventAcceptedVol->user_id])}}">{{$eventAcceptedVol->nameInEnglish}}</a><pre>            </pre>
              @if($mine && $event->endDate > $date)
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$eventAcceptedVol->id , 'eventId' => $event->id])}}">unAccept</a>
                @endif
              </button>
            @endforeach
            </div>
          </div>
        @endif
      </div>


        @endif
@endif
@endsection('content')
