@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
            <h2 class="pinkcolor ">UpComing Events You Joined in</h2>
            <hr>
                <?php $events = $acceptedEvents; ?>
                @include('includes.events')
              <br>

            <h2 class="pinkcolor ">UpComing Events You Request to Join</h2>
            <hr>
                <?php $events = $requestedEvents; ?>
                @include('includes.events')
              <br>

              <h2 class="pinkcolor ">Events You Invited To</h2>
            <hr>
              <?php $events = $invitedEvents; ?>
              @include('includes.events')
              <br>

          </div>
      </div>
</div>

@endsection
