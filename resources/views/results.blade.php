@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-4 mb-3" style="color: var(--green);">Results <small></small></h1>

    <ul class="nav sw-nav-tabs" role="tablist" id ="nnnn">
      <li class="nav-item first-tab">
        <a class="nav-link  active" data-toggle="tab" id="ntab" href="#home" role="tab">Users</a>
      </li>
      <li class="nav-item second-tab">
        <a class="nav-link" data-toggle="tab" id="rtab" href="#profile" role="tab">Events</a>
      </li>

    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel">


        <!-- Blog Post -->
        <div class="row">

        @foreach($users as $result)
        @continue($result->userType==10)
        <div class="col-lg-3 col-sm-4" style="margin-bottom:25px;">
            <div class="card h-100">
                        <a href="{{route('profile',[$result->id])}}">
                            <!--{$result->mainImgpath}}-->
                          <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$result->picture}}" alt="">
                      </a>
                        <div class="card-block">
                          <a href="{{route('profile',[$result->id])}}"><h2 class="card-title">{{$result->name}}</h2></a>
                    <p class="card-text">
                      @if($result->userType==0)
                      Volunteer
                      @elseif($result->userType==1)
                      Institute
                      @elseif($result->userType==2)
                      Resercher
                      @else
                      ADMIN
                      @endif

                    </p>
                </div>
            </div>
        </div>

    @endforeach
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
      {{$users->links('vendor.pagination.custom')}}
    </ul>
    </nav>
      </div>


      <div class="tab-pane" id="profile" role="tabpanel">
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
                          <a href='event/{{$event->id}}' class="card-link yellow-link ">Follow</a>
                        </div>
                      </div>
                    </div>

                    @endforeach

                      </div>
                      <br>

                                <div class="row justify-content-center">
                    <form action="{{route('allEvents')}}" method="GET"><button class="btn btn-pink">View more</button></form>
    </div>
                 </div>
            </div>



        <!-- Pagination -->
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
          {{$events->links('vendor.pagination.custom')}}
        </ul>
        </nav>


      </div>

    </div>



</div>

<!-- /.container -->

@endsection('content')
