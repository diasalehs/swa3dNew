@extends('layouts.master')

@section('content')
<div class="container">
  <h1 class="mt-4 mb-3" style="color: var(--green);">Results <small></small></h1>

    <ul class="nav search-nav-tabs" role="tablist" id ="nnnn">
      <li class="nav-item users-tab">
        <a class="nav-link  active" data-toggle="tab" id="ntab" href="#home" role="tab">Users</a>
      </li>
      <li class="nav-item events-tab">
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

        {{-- events earch results --}}
            <div class="row">

            <!-- Blog Post -->
            @foreach($events as $result)
            <div class="col-lg-4 col-sm-6" style="margin-bottom:25px;">
                <div class="card h-100">
                    <a href="event/{{$result->id}}">
                      <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/events/{{$result->cover}}" alt="">
                    </a>
                        <div class="card-block">
                          <a href="event/{{$result->id}}"><h2 class="card-title">{{$result->title}}</h2></a>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer text-muted">
                    @if(date('Y-m-d') > $result->endDate)
                     This event has Ended
                    @elseif(date('Y-m-d') <= $result->endDate)
                        Starts on :{{$result->startDate}}
                        <br>
                        Ends on:{{$result->endDate}}
                    @endif
                    </div>
                </div>
            </div>


            @endforeach
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
