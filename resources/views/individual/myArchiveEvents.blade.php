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
        <div class="col-12" style="color: #333">
          <div class="row justify-content-center">

          @foreach($myArchiveEvents as $event)
          <div class="col-md-6 col-sm-12">
       <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h4 class="card-title line-clamp-2">{{$event->title}}</h4>
                  <div class="card-bottom">
                    <p class="card-text "><small>{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}}</small></p>
                    <a href="{{route('event',$event->id)}}" class="btn btn-green" >View</a>
                    
                    <a class="btn btn-green" style="color:#fff" data-toggle="modal" data-target="#lessonsModal">Lessons Learned</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

              </div>

         </div>

              <br>
    </div>
  </div>
</div>

@endsection
