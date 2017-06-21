@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>My Up Coming Events</h1>
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
              foreach ($Uevents as $event) {
                    $date = date('Y-m-d');
                    echo "<tr>
                    <td>
                    <a class='green-link'  href='".route('event',[$event->id])."'>{$event->title}</a>
                    </td>
                    <td>".$event->startDate."</td>
                    <td>".$event->endDate."</td>
                    <td>
                        <div class='btn-group' style='width:100%'>
                          <button type='button' class='btn btn-green btn-block dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Action
                          </button>
                          <div class='dropdown-menu '>
                            <a class='dropdown-item' href='".route('eventDelete',[$event->id])."'>Delete</a>
                            <a class='dropdown-item' href='".route('eventVeiwEdit',[$event->id])."'>Edit</a>

                          </div>
                        </div>
                    </td>
                    </tr>";
              }?>
              </tbody>
          </table>

         </div>

    </div>
</div>

@endsection
