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
    <div class="card mb-4">
        <div class="card-block">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#">
                        <img class="img-fluid rounded all-news-img" src="http://placehold.it/750x300" alt="">
                    </a>
                </div>
                <div class="col-lg-6">
                    <h2 class="card-title">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisici</p>
                    <a href="#" class="btn btn-primary btn-green">Read More &rarr;</a>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Posted on January 1, 2017
        </div>
    </div>


    <!-- Pagination -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>

</div>

</div>
<!-- /.container -->

@endsection('content')
