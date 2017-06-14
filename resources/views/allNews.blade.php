@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">All News <small></small></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('main') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All News</li>
    </ol>

    <!-- Blog Post -->
    @foreach($news as $anew)
    <div class="card mb-4">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#">
                      <img class="img-fluid rounded all-news-img" src="{{$anew->mainImgpath}}" alt="">
                  </a>

              </div>
              <div class="col-lg-6">
                <h2 class="card-title">{{$anew->title}}</h2>
                <p class="card-text line-clamp">{{$anew->textarea}}</p>
                <a href="{{route('view',[$anew->id])}}" class="btn btn-primary btn-green">Read More &rarr;</a>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
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
