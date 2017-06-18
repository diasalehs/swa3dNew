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
              foreach ($following as $followi) {
                $usere=User::findOrFail($followi->requested_id);
                echo "<tr>
                <td>
                      <a class='btn'  href='".route('profile',[$usere->id])."'>{$usere->name}</a>
                </td>
                <td>".$usere->email."</td>
                <td>
                <a class='btn btn-success btn-block'  href='allusers/unfollow/".$usere->id."'>unfollow</a>
                </td>
                </tr>";
              }
              ?>
              </tbody>
          </table>

         </div>
    </div>
</div>

@endsection('content')
