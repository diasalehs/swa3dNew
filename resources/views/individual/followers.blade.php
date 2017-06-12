@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('includes.sidebar')

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
              foreach ($followers as $user) {
                 echo "<tr>
              <td>".$user->name."</td>
              <td>".$user->email."</td>
              <td>
              <a class='btn btn-success btn-block'  href='allusers/".$user->id."'>follow</a>
              </td>
                </tr>";

              }?></tbody>
                       </div>
    </div>
  </div>
</div>

@endsection
