<?php
use App\user;
?>
@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <h1>All Users</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($users_record as $user) {
                  $flag = 0;
                  foreach ($following as $followi) {
                    $userei=User::findOrFail($followi->requested_id);
                    if($user->id == $userei->id){
                      echo "<tr>
                      <td>".$user->name."</td>
                      <td>".$user->email."</td>
                      <td>
                      <a class='btn btn-success btn-block'  href='allusers/unfollow/".$user->id."'>unfollow</a>
                      </td>
                      </tr>";
                      $flag = 1;
                    }
                  }
                  if($flag == 0){
                      echo "<tr>
                      <td>".$user->name."</td>
                      <td>".$user->email."</td>
                      <td>
                      <a class='btn btn-success btn-block'  href='allusers/follow/".$user->id."'>follow</a>
                      </td>
                      </tr>";
                  }
              }
                ?>
              </tbody>
          </table>


         </div>
    </div>
</div>

@endsection
