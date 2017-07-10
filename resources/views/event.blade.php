@extends('layouts.master')

@section('content')
<<<<<<< HEAD

@if($event->endDate > $date)

@if(Auth::guest())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->location}}</p>
                  <a href="{{route('login')}}" class="card-link pink-link">Volunteer</a>
                </div>
              </div>
            </div>
              </div>
         </div>
    </div>
</div>

@elseif(Auth::check())
<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
=======
<div class="viewProfile" style="margin-bottom:30px;">

  <div class="jumbotron jumbotron-fluid text-center" style="background-image: linear-gradient(rgba(19, 58, 83, 0.8),rgba(19, 58, 83, 0.8)) , url({{URL::to('/')}}/events/{{$event->cover}});
  background-size:contain;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container">
      <h1 class="display-7 " style="color:#fff">{{$event->title}}</h1>
      <p class=""style="color:#fff">{{$event->description}} - made by: <a href="{{route('profile',$event->user_id)}}">{{$event->user->name}}</a></p>
      <p class=""style="color:#fff; margin-bottom:20px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}}</p>

@if(Auth::guest() && $event->endDate > $date)
      <a href="{{route('login')}}" class="btn btn-pink ">Volunteer</a>
@elseif(Auth::check() )
                @if($event->endDate > $date)
>>>>>>> d1d9de148c12445448de2eb0526d8137660415f6
                  @if($user->userType == 0)
                      @if($request)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                      @elseif(!$request)
                        <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      @endif
                  @elseif($mine && $archived == 0)
                    <a class="card-link pink-link" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                    <a class="card-link yellow-link" href="{{route('eventEdit',[$event->id])}}">Edit</a>
                  @endif
                @endif
</div>
</div>
        @if($mine)
        @if($archived == 0 || $archived == 2)
        <form class="" role="form" method="POST" action="{{ route('post') }}">{{ csrf_field() }}
          <div class="">
            <input id="name" type="text" style="display: none;" class="form-control" name="event_id" value="{{ $event->id }}"/>
          </div>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                <label for="title" class="col-lg-4 form-control-label">make a post</label>
                <div class="col-lg-6">
                    <textarea class="form-control" required="required" name="body" id="body">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <div class="alert alert-danger" role="alert">
                            <strong>Warning!</strong> {{ $errors->first('body') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-green btn-block">post</button>
                </div>
            </div>
          </form>
          @endif

          <div class=" col-lg-4">
            <h3 class="greencolor ">Volunteers in this event</h3>
            <hr />
            <div class="list-group" style="color: var(--navy);">
            @foreach($eventVols as $eventVol)
              <button type="button" class="list-group-item list-group-item-action"><a href="{{route('profile',[$eventVol->user_id])}}">{{$eventVol->nameInEnglish}}</a><pre>            </pre><a class="btn btn-primary btn-sm" href="{{route('acceptVolunteer',['volunteerId'=>$eventVol->id , 'eventId' => $event->id])}}">Accept</a></button>
            @endforeach
            </div>
          </div>
        @endif

        @if($event->open || $eventCloseAllowed || $mine)
    <div class="container">
    <div class="row">
        <div class="col-lg-8">
          <h3 class="greencolor ">Event Posts</h3>
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
      </div>
<<<<<<< HEAD
</div>
@endif


@else

<div class="container-fluid" style="margin:30px auto; padding:5px;">
    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                </div>
              </div>
            </div>
              </div>

         </div>

    </div>
</div>
@if(Auth::check())
@if($event->open)

          <h1>Posts</h1>
          @foreach($posts as $post)
            <hr>
            <h3>{{$post->body}}</h3>
            <hr>
          @endforeach

          <div class="col-lg-3">
            <hr>

            <table class="table table-responsive text-center table-sm table-fixed">
            <h1>Volunteers</h1>
            <thead class="text-center">
              <tr>
                <th>Name</th>
                @if($mine)
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$eventAcceptedVol->user_id])}}">{{$eventAcceptedVol->nameInEnglish}}</a>
                  </td>
                  @if($mine)
                  <td>
=======
  </div>

          <div class=" col-lg-4">
            <h3 class="greencolor ">Accepted Volunteers</h3>
            <hr />
            <div class="list-group" style="color: var(--navy);">
            @foreach($eventAcceptedVols as $eventAcceptedVol)
              <button type="button" class="list-group-item list-group-item-action"><a href="{{route('profile',[$eventAcceptedVol->user_id])}}">{{$eventAcceptedVol->nameInEnglish}}</a><pre>            </pre>
              @if($mine && $event->endDate > $date)
>>>>>>> d1d9de148c12445448de2eb0526d8137660415f6
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$eventAcceptedVol->id , 'eventId' => $event->id])}}">unAccept</a>
                @endif
              </button>
            @endforeach
            </div>
          </div>
        @endif
@endif
@endsection('content')
