@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
            <h1 class="pinkcolor ">Archived Events You Joined in</h1>
            <hr />

<?php $events = $myArchiveEvents; ?>
@include('includes.events')

              <br>
    </div>
  </div>
</div>

@endsection
