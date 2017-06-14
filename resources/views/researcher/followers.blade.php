<?php
use App\user;
?>
@extends('researcher/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('researcher/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Followers</h1>

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
              foreach ($followers as $follower) {
                $flag = 0;
                $userer=User::findOrFail($follower->requester_id);
                foreach ($following as $followi) {
                  $userei=User::findOrFail($followi->requested_id);
                  if($userer->id == $userei->id){
                    echo "<tr>
                    <td>".$userer->name."</td>
                    <td>".$userer->email."</td>
                    <td>
                    <a class='btn btn-success btn-block'  href='allusers/follow/".$userer->id."'>follow</a>
                    </td>
                    </tr>";
                    $flag = 1;
                }
                if($flag == 0){
                    echo "<tr>
                    <td>".$userer->name."</td>
                    <td>".$userer->email."</td>
                    <td>
                    <a class='btn btn-success btn-block'  href='allusers/unfollow/".$userer->id."'>unfollow</a>
                    </td>
                    </tr>";
                    $flag = 1;
                }
              }

              }?>
              </tbody>
          </table>

         </div>
    </div>
</div>

@endsection
