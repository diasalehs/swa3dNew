
@extends('institute.layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">

    @include('institute.includes.sidebar')
    <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">

                  <h1>All News</h1>
                  @if($news!=null)
                  <div class="row">
                   @foreach($news as $n)
                      <div class="col-lg-4">
                          <div class="card" style="width: 20rem; margin-bottom:20px;">
                              <div class="card-block">
                                  <h5 class="card-title">{{$n->title}}</h5>
                              </div>
                              <div class="card-block">
                                  <a href="{{route('editMyNews',[$n->id])}}" class="card-link">Edit</a>
                              </div>
                              </div>
                      </div>
                  @endforeach
                  </div>
                  @else
                  <h1>you have not published any news yet!</h1>
                  @endif
                  {{$news->links()}}
@endsection('content')
