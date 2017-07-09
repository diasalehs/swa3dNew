@extends('layouts.master')

@section('content')

<div class="news">
  <div class="card card-inverse">
    <img class="card-img" src="http://ajslp.pubs.asha.org/data/Journals/AJSLP/0/AJSLP_ResearchTuesdayfig0.jpeg" alt="Card image">

    <div class="card-img-overlay">
      <h1 class="card-title">{{$research->title}}</h1>
    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-lg-8">
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title"></h4>
                    <p class="card-text">
                    Abstract: <br> {{$research->abstract}}<br>
                    Publication Date: {{$research->created_at}} <br>
                    Creation date: {{$research->creation_date}} <br>
                    Recommendaions: {{$research->recommendations}}<br>
                    Findings: {{$research->findings}}<br>
                    Tools: {{$research->tool1}},{{$research->tool2}}<br>
                    </p>
                  </div>
                </div>
                <br>
                <form method="get" action="{{route('download',[$research->id])}}">  
                <button type="submit" class="btn btn-primary btn-sm">download</button>
                </form>

         
        </div>
      </div>
 </div>

</div>

@endsection('content')
