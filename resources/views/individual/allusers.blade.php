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
                <tr>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td><a class="btn btn-primary" href="#" role="button">Link</a></td>
                </tr>
                <td>Mark</td>
                <td>Otto</td>
                <td><a class="btn btn-primary" href="#" role="button">Link</a></td>
              </tr>
              </tbody>
          </table>


         </div>
    </div>
</div>

@endsection
