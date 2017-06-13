@extends('layouts.master')

@section('content')
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Results <small></small></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('main') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Results</li>
    </ol>

    <!-- Blog Post -->
    @foreach($results as $result)
    <div class="card mb-4">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#">
                        <!--{$result->mainImgpath}}-->

                      <img class="img-fluid rounded all-news-img" src="" alt="">
                  </a>

              </div>
              <div class="col-lg-6">
                <h2 class="card-title">{{$result->name}}</h2>
                <p class="card-text"></p>
                <a href="{{route('view',[$result->id])}}" class="btn btn-primary btn-green">Read More &rarr;</a>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        joined on {{$result->created_at}}
    </div>
</div>
@endforeach

<!-- Pagination -->
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
  {{$results->links()}}
</ul>
</nav>

</div>

</div>
<!-- /.container -->

@endsection('content')
