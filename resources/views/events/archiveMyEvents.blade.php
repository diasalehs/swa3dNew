@extends('layouts.master')
 @section('content')


<div class="container" style="margin:20px auto">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">

  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link "  href="{{route('makeEvent')}}" >Create Event</a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " href="{{route('myEvents')}}" >Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link active" href="{{route('archiveMyEvents')}}" >My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>
</ul>


<div class="tab-content">

          <h1>My Archived Events</h1>
          <table class="table">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($Aevents as $event)
                    <tr>
                    <td>
                    <a class='btn'  href="{{route('event',$event->id)}}">{{$event->title}}</a>
                    </td>
                    <td>{{$event->startDate}}</td>
                    <td>{{$event->endDate}}</td>
                    </tr>
           @endforeach
              </tbody>
          </table>
</div>

@endsection
