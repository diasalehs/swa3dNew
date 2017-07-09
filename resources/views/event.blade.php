@extends('layouts.master')

@section('content')

@if($event->endDate > $date)
<div class="viewProfile" style="margin-bottom:30px;">
  <div id="search">
      <button type="button" class="close">×</button>
      <form>
          <input type="search" class="st" value="" placeholder="type keyword(s) here" />

          <button type="submit" class="btn btn-green">Search this event</button>
      </form>
  </div>
@if(Auth::guest())

  <div class="jumbotron jumbotron-fluid text-center"style="background-image: linear-gradient(rgba(19, 58, 83, 0.8),rgba(19, 58, 83, 0.8)),url({{URL::to('/')}}/events/{{$event->cover}});
  background-size:contain;background-repeat: no-repeat;
  background-position: right top;
  background-attachment: fixed;
  ">
    <div class="container">
      <h1 class="display-7 " style="color:#fff">{{$event->title}}</h1>
      <p class=""style="color:#fff">{{$event->description}}</p>
      <p class=""style="color:#fff; margin-bottom:20px">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
      <a href="{{route('login')}}" class="btn btn-pink ">Volunteer</a>
      <a href="{{route('login')}}" class="btn btn-yellow ">Follow</a>
      <a href="#search" class="btn btn-green " >Search this event</a>
    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-lg-8">
          <h3 class="greencolor ">Event Posts</h3>
          <hr />
          @if($event->open)
            <div class="card" style="margin-bottom:20px;">
              <div class="card-block">
                <h4 class="card-title greencolor" >Post Title</h4>
                <p class="card-text">
                  It is a long established
                  fact that a reader will be distracted
                   by the readable
                   content of a page when looking at its layout.
              </div>
            </div>
            <div class="card"style="margin-bottom:20px;">
              <div class="card-block">
                <h4 class="card-title greencolor">Post Title</h4>
                <p class="card-text" style="color: var(--navy);">
                  It is a long established
                  fact that a reader will be distracted
                   by the readable
                   content of a page when looking at its layout.
              </div>
            </div>
          @endif


          </div>
          <div class=" col-lg-4">

            <h3 class="greencolor ">Volunteers in this event</h3>
            <hr />

            <div class="list-group" style="color: var(--navy);">
              <button type="button" class="list-group-item list-group-item-action">
                Cras justo odio
              </button>
              <button type="button" class="list-group-item list-group-item-action" data-toggle="tooltip" data-placement="top" title="Tooltip on top">Dapibus ac facilisis in</button>
              <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
              <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
              <button type="button" class="list-group-item list-group-item-action" >Vestibulum at eros</button>
              <button type="button" class="list-group-item list-group-item-action btn-green seeall" >See All</button>
            </div>

            <div>
              
            </div>


          </div>
        </div>
      </div>
</div>
@endif

@if(Auth::check())
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
                    <a class="card-link yellow-link" href="">Edit</a>
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
