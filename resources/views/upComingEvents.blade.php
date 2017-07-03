@extends('layouts.master')

@section('content')


<div class="container min" style="margin:30px auto; padding:5px;">
  
  @if(Auth::guest())

    <div class="row">
         <div class="col-12" style="color: #333">
          <div class="row justify-content-center">
            <h1 class="pinkcolor col-md-8 col-sm-12">UpComing Events</h1>
            <form>

  </form>
          @foreach($events as $event)
          <div class="col-md-8 col-sm-12">
              <div class="card card-inverse event">
                <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                <div class="card-img-overlay">
                  <h3 class="card-title">{{$event->title}}</h3>
                  <p class="card-text line-clamp-4">{{$event->description}}</p>
                  <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                  <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                  <a href="{{route('login')}}" class="card-link pink-link">Volunteer</a>
                  <a href="{{route('login')}}" class="card-link yellow-link ">Follow</a>
                </div>
              </div>
            </div>

            @endforeach
              </div>
              {{$events->links()}}

         </div>

    </div>
    @endif

@if(Auth::check())

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active" data-toggle="tab" href="#messages" role="tab">Events All Over / Search</a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " data-toggle="tab" href="#home" role="tab">Events in your counrty</a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Events matches your intrests</a>
  </li>


</ul>
<div class="tab-content">
  <div class="tab-pane active" id="messages" role="tabpanel">
    <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" class="green-link" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Advance Search
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse " role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block"class="">

        <form id="myform"class=""style="display: flex;
          justify-content:center;
          flex-wrap: wrap;
       align-items: flex-start;
      ">

          <div class="form-group">
            <label for="location" >Location</label>
            <input type="text" id="location" class="form-control" name="location" placeholder="e.g. Nablus">
          </div>
          <div class="form-group"style="margin-left:15px;">

          <label for="Select1" style="align-self: flex-start;">target</label>
           <select name="target[]"class="form-control" id="Select1" multiple>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
           </select>
         </div>

         <div class="form-group" style="margin-left:15px;">
           <label for="Select2" style="align-self: flex-start;">intrest</label>
           <select name="intrest[]" class="form-control" id="Select2"  multiple>
             <option value="1">1</option>
             <option value="2">2</option>
             <option value="3">3</option>
           </select>
         </div>

        </form>
        <div class="row justify-content-center">
          <div class="col-4">
          <button type="submit"form="myform" class="btn btn-block btn-green" >Search</button>
        </div>
      </div>

      </div>
    </div>
</div>
</div>

    <div class="row">
             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">
              @foreach($events as $event)
              <div class="col-md-8 col-sm-12">
                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h3 class="card-title">{{$event->title}}</h3>
                      <p class="card-text line-clamp-4">{{$event->description}}</p>
                      <p class="">{{$event->startDate}} To {{$event->endDate}} - in Nablus</p>
                      <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->individual_id == $user->individuals->id && $event->id == $volEvent->event_id && $flag == 0)
                              <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                              <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                              <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>

                @endforeach

                  </div>
                  <br>

                    <div class="row justify-content-center">
                <form action="{{route('allEvents')}}" method="GET">
                  <button class="btn btn-green">View more</button></form>
                  </div>
             </div>
        </div>
    </div>

  <div class="tab-pane" id="home" role="tabpanel">
            <div class="row">
             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">

              @foreach($localevents as $event)
              <div class="col-md-8 col-sm-12">
                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h3 class="card-title">{{$event->title}}</h3>
                      <p class="card-text line-clamp-4">{{$event->description}}</p>
                      <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
                      <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->individual_id == $user->individuals->id && $event->id == $volEvent->event_id && $flag == 0)
                              <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                              <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                              <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        @endif
                      @endif
                    </div>
                  </div>
                </div>

                @endforeach
                <br>

                </div>
                  <div class="row justify-content-center">
                    <form class="" action="{{route('allLocal')}}" method="GET">
                        <button class="btn btn-pink" >View more</button>
                    </form>
                  </div>
             </div>
        </div>
    </div>
  <div class="tab-pane" id="profile" role="tabpanel">
    <div class="row">
             <div class="col-12" style="color: #333">
              <div class="row justify-content-center">
              @foreach($localevents as $event)
                @foreach($userevent as $eve)
                  @if($event->id == $eve->event_id)
                   <div class="col-md-8 col-sm-12">
                  <div class="card card-inverse event">
                    <img class="card-img" src="{{URL::to('/')}}/events/{{$event->cover}}" alt="Card image">
                    <div class="card-img-overlay">
                      <h3 class="card-title">{{$event->title}}</h3>
                      <p class="card-text line-clamp-4">{{$event->description}}</p>
                      <p class="">{{$event->startDate}} To {{$event->endDate}} - in {{$event->city}}</p>
                      <a href='event/{{$event->id}}' class="card-link green-link" >View</a>
                      @if($user->userType != 1)
                      <?php $flag = 0; ?>
                        @foreach($volEvents as $volEvent)
                          @if($volEvent->event_id == $event->id)
                            <a href="{{route('disVolunteer',[$event->id])}}" class="card-link pink-link">Cancel Volunteer Request</a>
                            <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                            <?php $flag = 1; ?>
                          @elseif($flag == 0)
                            <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                            <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                            <?php $flag = 1; ?>
                          @endif
                        @endforeach
                        @if($flag == 0)
                          <a href="{{route('volunteer',[$event->id])}}" class="card-link pink-link">Volunteer Request</a>
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        @endif
                      @endif
                    </div>
                  </div>
               </div>
                  @endif

                @endforeach
                @endforeach


                  </div>
                  <br>
                  {{-- needs to be routed to  an allmatched page  --}}
                  <div class="row justify-content-center" >
                  <form action="{{route('allLocal')}}" method="GET"><button class="btn btn-yellow">View more</button></form>
                    </div>
             </div>

        </div>

  </div>



  </div>
  @endif

</div>

<script>

</script>
@endsection('content')
