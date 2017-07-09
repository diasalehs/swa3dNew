@extends('layouts.master')
 @section('content')


<div class="container" style="margin:100px auto">

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
