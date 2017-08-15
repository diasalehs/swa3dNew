@extends('layouts.master')
@section('title')
Swa3ed - My Events
@endsection
 @section('content')

<div class="container" style="margin:20px auto; min-height:500px">

<ul class="nav nav-tabs sw-nav-tabs " role="tablist" style="margin-bottom:30px;margin-top:40px;">
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


<?php $events = $Uevents; ?>
@include('includes.events')



@endsection
