<?php
use App\User;
use App\news;

?>
@extends('admin/layouts.adminMaster')

@section('content')

    <div class="container-fluid">
    @include('admin/includes.adminSidebar')
        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Dashboard</h1>
            <div class="row mb-3">
                <div class="col-xl-3 col-lg-6">
                  <a href="{{route('news')}}" style="text-decoration:none">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success">
                            <div class="rotate">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Users</h6>
                            <h1 class="display-1">{{User::count()}}</h1>
                        </div>
                    </div>
                  </a>
                </div>
                 <div class="col-xl-3 col-lg-6 ">
                    <a href="{{route('news')}}" style="text-decoration:none">
                 <div class="card card-inverse card-danger">
                        <div class="card-block bg-danger">
                            <div class="rotate">
                                <i class="fa fa-list fa-4x"></i>
                            </div>

                            <h6 class="text-uppercase">News</h6>
                            <h1 class="display-1">{{news::count()}}</h1>
                        </div>
                    </div>
                </a>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info">
                            <div class="rotate">
                                <i class="fa fa-twitter fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Tweets</h6>
                            <h1 class="display-1">125</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-warning">
                            <div class="rotate">
                                <i class="fa fa-share fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Shares</h6>
                            <h1 class="display-1">36</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->


          <h2>Section title</h2>
          <div class="table-responsive" style="min-height: 300px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Register Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($users_record as $user) {
                 echo "<tr>
                  <td>".$user->id."</td>
                  <td>".$user->name."</td>
                  <td>".$user->email."</td>
                  <td>".$user->created_at."</td>
                  <td><div class='dropdown'>
                  <button class='btn btn-info dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Action
                  </button>
                  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' href='#'>Show</a>
                    <a class='dropdown-item' href='#'>Edit</a>
                    <a class='dropdown-item'  href='admin/userdelete/".$user->id."'>Delete</a>
                  </div>
                </div>
                </td>

                </tr>";
                # code...
              }?>

              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

@endsection('content')
