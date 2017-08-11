@extends('layouts.master')

@section('content')
<div class="viewProfile" style="">
@include('events.includes.header')
<div class="container-fluid "style="margin-bottom:50px;margin-top:30px;">
  <div class="row ">
@include('events.includes.sidebar')
{{-- --}}

    <div class="col-sm-12 col-md-8" >


@if(count($posts) == 0)
                <h3 class="greencolor " style="">No posts to show</h3>
                <hr />
                @else
                <h3 class="greencolor " style="">Event Posts</h3>
                <hr />
              @foreach($posts as $post)
                  <div class="card" style="margin-bottom:20px;">
                    <div class="card-block">
                      <h4 class="card-title greencolor" >{{$post->body}}</h4>
                        {{$post->created_at}}
                    </div>
                  </div>
              @endforeach
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

    <script src="{{URL::asset('vendor/js/bootstrap-select.js')}} "></script>

    <script src="{{URL::asset('vendor/js/event.js')}} "></script>
    <script src="{{URL::asset('vendor/js/jstarbox.js')}} "></script>

    <script src="{{URL::asset('vendor/js/RateJS.js')}} "></script>


@endsection
