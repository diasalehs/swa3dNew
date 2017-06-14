@extends('layouts.master')

@section('content')

<div class="container-fluid" style="margin:120px auto">
    <div class="row">
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Archived Events</h1>
          <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                </tr>
              </thead>
              <tbody>
              <?php
              foreach ($events as $event) {
                    $date = date('Y-m-d');
                    if($event->startDate < $date){
                    echo "<tr>
                    <td>
                    <a class='btn'  href='event/".$event->id."'>{$event->title}</a>
                    </td>
                    <td>".$event->startDate."</td>
                    <td>".$event->endDate."</td>
                    </tr>";
                  } 
              }?>
              </tbody>
          </table>

         </div>

    </div>
</div>

@endsection('content')
