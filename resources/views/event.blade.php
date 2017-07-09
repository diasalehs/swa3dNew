@extends('layouts.master')

@section('content')

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
                  @if($user->userType == 0)
                      @if($request)
                        <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                      @elseif(!$request)
                        <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                      @endif
                      <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                  @elseif($mine && $archived == 0)
                    <a class="card-link pink-link" href="{{route('eventDelete',[$event->id])}}">Delete</a>
                    <a class="card-link yellow-link" href="{{route('eventVeiwEdit',[$event->id])}}">Edit</a>
                  @endif
                </div>
              </div>
            </div>
              </div>
         </div>
              <br>
    </div>
<br><br>

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

          <div class="col-lg-12">
            <hr>

            <table class="table table-responsive text-center  table-fixed">
            <thead class="text-center">
              <tr>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($eventVols as $eventVol)
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$eventVol->user_id])}}">{{$eventVol->nameInEnglish}}</a>
                  </td>
                  <td>
                  <a class="btn btn-primary btn-sm" href="{{route('acceptVolunteer',['volunteerId'=>$eventVol->id , 'eventId' => $event->id])}}">Accept</a>
                  </td>
                </tr>
              @endforeach


            </tbody>
          </table>
          </div>
        @endif

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
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$eventAcceptedVol->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        @elseif(!$event->open)
          @if($eventCloseAllowed || $mine)

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
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$eventAcceptedVol->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
          @endif
        @endif

        </div>
      </div>
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
                <a class="btn btn-primary btn-sm" href="{{route('unAcceptVolunteer',['volunteerId'=>$eventAcceptedVol->id , 'eventId' => $event->id])}}">unAccept</a>
                </td>
                @endif
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
        @elseif(!$event->open)
          @if($eventCloseAllowed || $mine)

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
              </tr>
            </thead>
            <tbody>
              @foreach($eventAcceptedVols as $eventAcceptedVol)
                <tr>
                  <td>
                  <a class='btn'  href="{{route('profile',[$eventAcceptedVol->user_id])}}">{{$eventAcceptedVol->nameInEnglish}}</a>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
          </div>
          @endif
        @endif
@endif
@endif

@endsection('content')
