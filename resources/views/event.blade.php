@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container " style= "margin-bottom:50px;margin-top:30px;">
  <div class="row ">
@include('events.includes.sidebar')
{{-- --}}

    <div class="col-sm-12 col-md-8" >

      <div class="card">
        <div class="card-header">
          Details
        </div>
        <div class="card-block">
          <p class=" card-text"style="text-align:justify;">{{$event->description}}</p>
          <p class=""style="text-align:center; margin-bottom:20px; margin-top:40px">{{$event->startDate}} To {{$event->endDate}} - in {{$event->country}} | Created by: <a href="{{route('profile',$event->user_id)}}" class="green-link">{{$event->user->name}}</a></p>

        </div>

      </div>
      @if (Auth::user())
      <div class="card" style="margin-top:10px;">
        <div class="card-header">
          Goals
        </div>
        <div class="card-block">
          <p class=" card-text"style="text-align:justify;">{{$lesson->goals}}</p> 

        </div>

      </div>
      @endif
      

@if(Auth::guest())
          <div class="card card-outline-warning mb-3 text-center" style="border-color: var(--green); margin-top:30px;">
            <div class="card-block">
              <blockquote class="card-blockquote">
                <p>                    You should login to see more.</p>
              </blockquote>
              <a href="{{route('login')}}" class="btn btn-green ">Login to see more</a>

            </div>
          </div>
@endif

{{-- --}}

              </div>


            </div>
          </div>
        </div>

@include('events.includes.postModal')
@include('events.includes.reviewModal')
@include('events.includes.rateModal')

@endsection('content')
@section('scripts')

<script src="{{URL::asset('vendor/js/event.js')}} "></script>
@endsection
