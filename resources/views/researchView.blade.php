@extends('layouts.master')
@section('title')
  Swa3ed - {{$research->title}}

@endsection
@section('content')

<div class="research" >

  <div class="container">


    <div class="row justify-content-center">

        <div class="col-md-8 col-10 letter" style="background-color:#f5f5f5">
                <div class="card" style="border:0;background-color:#f5f5f5">
                  <div class="card-block">
                    <div class="research-header row">
                        <p class="col-md-6 col-sm-12">
                          Publication Date: {{$research->created_at->toFormattedDateString()}}

                        </p>
                        <p class="col-md-6 col-sm-12 r">
                          Creation date: {{$research->creation_date}}

                        </p>

                    </div>

                    <h3 class="card-title" >{{$research->title}}</h3>
                    <hr />
                    <div class="research-content">

                    <h5>Researcher Name</h5>

                    <p class="card-title" >&emsp;<a href="{{route('profile',[$user->user_id])}}" class="pink-link">{{$research->researcher_name}}</a></p>

                    <h5>Abstract</h5>
                     <p>
                      &emsp; {{$research->abstract}}
                     </p>
                     <h5>Recommendaions</h5>
                      <p>
                        &emsp;{{$research->recommendations}}
                      </p>
                      <h5>Findings</h5>
                       <p>
                         &emsp;{{$research->findings}}
                       </p>
                       <h5>Tools</h5>
                        <ol>
                          <li>  {{$research->tool1}}</li>
                          <li>  {{$research->tool2}}</li>
                        </ol>
                      </div>

                  </div>
                  <div class="row justify-content-center" style="margin-top:10px; ">

                  <form method="get" class="col-md-4 col-sm-6" action="{{route('download',[$research->id])}}">
                  <button type="submit" class="btn btn-pink btn-block">Download</button>
                  </form>


                </div>
                </div>
                <br>



        </div>

      </div>

    <div class="row justify-content-center" style="margin-top:40px; margin-bottom:60px;">

      @foreach($research->tags as $t)
      <a href="#" style="margin-right:10px;"><h3><span class="badge badge-pill badge-default tags">#{{$t->name}}</span></h3></a>
      @endforeach
    </div>
  </div>

</div>

@endsection('content')
