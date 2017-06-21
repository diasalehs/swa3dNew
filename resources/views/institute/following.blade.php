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
          <hr>

        <div class="row justify-content-around">

           <?php
           foreach ($following as $followi) {
             $usere=User::findOrFail($followi->requested_id);?>

               <div class="card col-5 mb-4">
                   <div class="card-block">
                       <div class="row">
                           <div class="col-6">
                               <a href="#">
                                 <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$user->picture}}" alt="">
                             </a>

                         </div>
                         <div class="col-6">
                           <h5 class="card-title greencolor">{{$usere->name}}</h5>
                           <p class="card-text line-clamp">{{$usere->email}}</p>
                           <a class='btn btn-danger'  href='allusers/unfollow/".$usere->id."'>Unfollow</a>
                       </div>
                   </div>
               </div>

           </div>
           <?php } ?>
         </div>
    </div>
  </div>
</div>

@endsection('content')
