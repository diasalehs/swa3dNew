@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Up Coming Events</h1>
          <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($events as $event) {
                    $date = date('Y-m-d');
                    if($event->startDate > $date){
                    echo "<tr>
                    <td>".$event->title."</td>
                    <td>".$event->startDate."</td>
                    <td>".$event->endDate."</td>
                    <td>
                    <a class='btn btn-success btn-block'  href='#".$event->id."'>delete</a>
                    </td>
                    </tr>";
                  }
              }?>
              </tbody>
          </table>

         </div>

    </div>
</div>

@endsection
