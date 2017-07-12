@extends('layouts.master')

@section('content')
<div class="container" style="margin-top:40px; min-height:600px;" >

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 pinkcolor">All Researches <small></small></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a class="pink-link" href="{{ route('main') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All Researches</li>
    </ol>

    <form method="get" action="{{route('Researches_search')}}" role="form" id="form-buscar">
      <div class="form-group">
        <div class="input-group">
          <input id="1" class="form-control" type="text" name="search" placeholder="Search..." required/>
          <span class="input-group-btn">
            <button class="btn btn-pink" style="  outline: 0 !important;
 border-top-left-radius:0px!important;border-bottom-left-radius:0px!important;" type="submit">
            <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
            </button>
          </span>
        </div>
      </div>
    </form>

<div class="row">
             @foreach($researches as $research)
            <div class="col-lg-4 col-sm-6">
                <div class="card research-card">
                    <h4 class="card-header"><span class="line-clamp-2 ">{{$research->title}}</span></h4>
                    <div class="card-block">
                        <p class="card-text line-clamp-10">{{$research->abstract}} </p>
                        <p class="RN">{{$research->researcher_name}}</p>
                        <a href="{{route('researchView',[$research->id])}}"> Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
          </div>

{{ $researches->links('vendor.pagination.custom')}}
</div>

@endsection('content')
