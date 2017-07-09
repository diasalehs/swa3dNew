@extends('layouts.master')
 @section('content')

<div class="container" style="margin:20px auto">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist">
  <li class="nav-item col-4 col-lg-3  first-tab">
    <a class="nav-link active"  href="{{route('myEvents')}}" >Up Coming Events    <span class="badge badge-default badge-pill">{{$Uevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  second-tab">
    <a class="nav-link " href="{{route('archiveMyEvents')}}" >My Archived Events    <span class="badge badge-default badge-pill">{{$Aevents->count()}}</span></a>
  </li>
  <li class="nav-item col-4 col-lg-3  third-tab ">
    <a class="nav-link " href="{{route('makeEvent')}}" >Create Event</a>
  </li>
</ul>



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
              @foreach ($Uevents as $event)
                    <tr>
                    <td>
                    <a class='btn'  href="{{route('event',$event->id)}}">{{$event->title}}</a>
                    </td>
                    <td>{{$event->startDate}}</td>
                    <td>{{$event->endDate}}</td>
                    <td>
                        <div class='btn-group' style='width:100%'>
                          <button type='button' class='btn btn-green btn-block dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Action
                          </button>
                          <div class='dropdown-menu '>
                            <a class='dropdown-item' href="{{route('eventDelete',[$event->id])}}">Delete</a>
                            <a class='dropdown-item' href="{{route('eventEdit',[$event->id])}}">Edit</a>
                          </div>
                        </div>
                    </td>
                    </tr>
              @endforeach
              </tbody>
          </table>
</div>

@endsection
