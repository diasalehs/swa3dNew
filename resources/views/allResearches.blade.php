@extends('layouts.master')

@section('content')

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
{{$researches->links('vendor.pagination.custom')}}

@endsection('content')
