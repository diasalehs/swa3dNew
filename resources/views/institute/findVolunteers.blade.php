<?php
use App\user;
?>
@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <h1>All Volunteers</h1>
           <div class="table-responsive">

            <table class="table  ">
              <thead>
                <tr>
                  <th>Name</th>
                  <th class='hidden-xs-down'>Email</th>
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
                      <td>
                      <a class='green-link'  href='".route('profile',[$userei->id])."'>{$userei->name}</a>
                      <td class='hidden-xs-down'>".$user->email."</td>
                      <td>
                      <a class='btn btn-pink btn-block'  href='allusers/unfollow/".$user->id."'>Unfollow</a>
                      </td>
                      </tr>";
                      $flag = 1;
                    }
                  }
                  if($flag == 0){
                      echo "<tr>
                      <td><a class='green-link'  href='".route('profile',[$userei->id])."'>".$user->name."</a></td>
                      <td class='hidden-xs-down'>".$user->email."</td>
                      <td>
                      <a class='btn btn-green btn-block'  href='allusers/follow/".$user->id."'>Follow</a>
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
</div>

@endsection
