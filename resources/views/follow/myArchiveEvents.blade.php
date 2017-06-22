@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
            <h1 class="pinkcolor ">Archived Events You Joined in</h1>
            <hr />
            <?php if (count($myArchiveEvents)==0) {
                echo '<h2 class="greencolor">
                  No events
                </h2>';
              }
              ?>
          @foreach($myArchiveEvents as $event)
          <div class="col-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href="{{route('event',$event->id)}}" class="card-link green-link" >View</a>
                </div>
              </div>
            </div>
            @endforeach
              <br>
    </div>
  </div>
</div>

@endsection
