<?php 
use App\user;
?>
@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <h1>Followers</h1>

<<<<<<< HEAD
=======
         <div class="col-lg-9">
        <h2>all followers</h2>
          <div class="table-responsive" style="min-height: 300px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($followers as $follower) {
                $usere=User::findOfFail($follower->requested_id);
                 echo "<tr>
              <td>".$usere->name."</td>
              <td>".$usere->email."</td>
              <td>
              <a class='btn btn-success btn-block'  href='allusers/".$usere->id."'>follow</a>
              </td>
                </tr>";
>>>>>>> 4e8343ca0123f05a9899e366869faba9ab47aa63


         </div>
    </div>
</div>

@endsection
