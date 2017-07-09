
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">


            <h1>All News</h1>
            <div class="row">
             @foreach($news_record as $news)
                <div class="col-lg-4">
                    <div class="card" style="width: 20rem; margin-bottom:20px;">
                        <div class="card-block">
                            <h5 class="card-title">{{$news->title}}</h5>
                        </div>
                        <div class="card-block">
                            <a href="{{route('edit',[$news->id])}}" class="card-link">Edit</a>
                            <a href="news/delete/{{$news->id}}" class="card-link text-danger">Delete</a>
                        </div>
                        </div>
                </div>
            @endforeach
            </div>
        </main>
</div>




    @endsection('content')
