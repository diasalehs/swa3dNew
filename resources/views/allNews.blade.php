@extends('layouts.master')

@section('content')
<div class="container min">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 greencolor">All News <small></small></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="green-link" href="{{ route('main') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All News</li>
    </ol>
    <div class="row justify-content-center">

      <form method="get" class="col-sm-12 col-md-6" action="{{route('Researches_search')}}" role="foحشrm" id="form-buscar">
        <div class="form-group" >
          <div class="input-group">
            <input id="1" class="form-control" type="text" name="search" placeholder="Search..." style="    border-color: var(--green) !important;
  " required/>
            <span class="input-group-btn">
              <button class="btn btn-green" style="  outline: 0 !important;
   border-top-left-radius:0px!important;border-bottom-left-radius:0px!important;" type="submit">
              <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
              </button>
            </span>
          </div>
        </div>
      </form>
    </div>

    <!-- Blog Post -->
    @foreach($news as $anew)
    <div class="card mb-4">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#">
                      <img class="img-fluid rounded all-news-img" style="" src="{{URL::to('/uploads')}}/{{$anew->mainImgpath}}" alt="">
                  </a>
              </div>
              <div class="col-lg-6">
                <h2 class="card-title greencolor"><a class="green-link" href="{{route('view',[$anew->id])}}">{{$anew->title}}</a></h2>
                <p class="card-text line-clamp">
                  {{$value=""}}
                <p style="display:none">
                  {{$value = str_limit( $anew->textarea , 150,$end = '...') }}
                </p>
                  <div id="news-t">
                      {!!$value !!}

                  </div>



                </p>
                <a href="{{route('view',[$anew->id])}}" class="btn btn-primary btn-green">Read More &rarr;</a>
            </div>
        </div>
    </div>
    <div class="card-footer text-mute">
        Posted on {{$anew->created_at}}
    </div>
</div>
@endforeach

<!-- Pagination -->
<nav aria-label="Page navigation example">
    {{$news->links('vendor.pagination.custom')}}

</nav>

</div>

</div>
<!-- /.container -->

@endsection('content')
