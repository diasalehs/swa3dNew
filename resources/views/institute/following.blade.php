<?php
use App\user;
?>
@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
          @include('institute/includes.sidebar')


	         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Following</h1>
          <div class="row  justify-content-between">

          @foreach ($following as $followi)
            <?php $usere=User::findOrFail($followi->requested_id);?>
          <div class="card col-5 " style="margin: 2px; padding:5px">
              <div class="card-block" style="padding:5px;">
                  <div class="row">
                      <div class="col-lg-6">
                          <a href="#">
                            <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$user->picture}}" alt="">
                        </a>

                    </div>
                    <div class="col-lg-6">
                      <h5 class="card-title">{{$usere->name}}</h5>
                      <p class="card-text line-clamp">{{$usere->email}}</p>
                      <a href="allusers/unfollow/'.<?php $usere->id ?>.'" class="btn btn-danger">UnFollow</a>
                  </div>
              </div>
          </div>

      </div>
      @endforeach
    </div>

         </div>
    </div>
</div>

@endsection('content')
