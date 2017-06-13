@extends('layouts.master')

@section('content')
 <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
            @foreach($_3slides as $slide)
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item @if ($loop->first) active @endif "
                  style="background-image:linear-gradient(rgba(0, 0, 0,.5),rgba(0, 0, 0, .5)), url('{{$slide->mainImgpath}}')">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>{{$slide->title}}</h3>
                        <p>{{$slide->textarea}}</p>
                    </div>
                </div>
                @endforeach

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container text-center top-5">
      <h1>Top 5 volunteers</h1>
      <div class="row justify-content-center">

         @foreach($volunteers as $volunteer)
          <div class="col-lg-2 col-sm-4 mb-4 user">
              <img class="img-fluid" src="{{$volunteer->picture}}" alt="">
              <div class="text-center">
                <h5 class="profile-name " style="margin-bottom: 0px;">{{$volunteer->nameInEnglish}}</h5>
                <small><a href="#">{{$volunteer->email}}</a></small>
              </div>
            </div>

         @endforeach

      </div>
    </div>

    <div class="container">
      <hr class="my-4">

        <!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item col-sm-4 col-lg-4 news-tab-item">
    <a class="nav-link active" data-toggle="tab" href="#home" role="tab">News</a>
  </li>
  <li class="nav-item col-sm-4 col-lg-4 researchs-tab-item">
    <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Researches</a>
  </li>
  <li class="nav-item col-sm-4 col-lg-4 dashboard-tab-item">
    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Dashboard</a>
  </li>

</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade show active" id="home" role="tabpanel">
    <div class="section">
        <h1 class="my-4 news-section-title text-center"></h1>

        <div class="row">
        @foreach($news_record as $news)
            <div class="col-lg-4 col-sm-6 ">
                <div class="card news-item">
                    <a href="{{route('view',[$news->id])}}"><img  class="card-img-top img-fluid" src="{{$news->mainImgpath}}" alt=""></a>
                    <div class="card-block">
                        <a href="{{route('view',[$news->id])}}" class="card-text">{{$news->title}}</a>
                        <p>
                          This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.

                        </p>
                          <span class="text-muted"> {{$news->created_at}} </span>
                    </div>
                    <div class="card-block">
                    </div>
                </div>
            </div>
          @endforeach
            </div>
              <div class="text-center ">
                <a href="{{route('allNews')}}"><button type="button" class="btn btn-primary  show-more-btn">More News</button></a>
            </div>
            </div>

  </div><!-- news tab -->

  <div class="tab-pane fade" id="profile" role="tabpanel">
    <div class="section researches">
        <h1 class="my-4 research-section-title text-center"></h1>
  <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicinecessitatibus neque.</p>
                        <p class="RN">Researcher Name.</p>
                        <a href="#"> Learn More</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consecteturas commodi similique totam consectetur praesentium molestiae atque exercitationem ut consequuntur, sed eveniet, magni nostrum sint fuga.</p>
                        <p class="RN">Researcher Name.</p>
                        <a href="#"> Learn More</a>

                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header">Research Title</h4>
                    <div class="card-block">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                        <p class="RN">Researcher Name.</p>
                        <a href="#"> Learn More</a>

                    </div>

                </div>
            </div>
        </div>
        <!-- /.row -->

        </div>
            <div class="text-center ">
                <button type="button" class="btn btn-primary show-more-btn more-researches">More Researchs</button>
            </div>
    </div>
  <div class="tab-pane fade" id="messages" role="tabpanel">.</div>
</div>

        <!-- Marketing Icons Section -->





@endsection('content')
