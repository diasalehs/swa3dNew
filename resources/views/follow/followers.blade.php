@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')

        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <h1>Followers</h1>
          <hr>

        <div class="row justify-content-around">
              @foreach ($followers as $follower)
            <div class="card col-5 mb-4">
             <div class="card-block">
                 <div class="row">
                     <div class="col-6">
                         <a href="#">
                           <img class="img-fluid rounded all-news-img" src="{{ URL::to('/') }}/pp/{{$follower->picture}}" alt="">
                       </a>
                   </div>
                   <div class="col-6">
                     <h5 class="card-title greencolor"><a href="{{route('profile',$follower->requester_id)}}">{{$follower->name}}</a></h5>
                     <p class="card-text line-clamp"><a href="{{route('messenger',$follower->email)}}">{{$follower->email}}</a></p>
              <?php $flag = 0; ?>
                @foreach($following as $followi)
                  @if($followi->email == $follower->email && $flag == 0)
                               <a class='btn btn-danger'  href='allusers/unfollow/{{$follower->id}}'>Unfollow</a>
                    <?php $flag = 1; ?>
                    @endif
                @endforeach
                @if($flag == 0)
                               <a class='btn btn-danger'  href='allusers/follow/{{$follower->id}}'>follow</a>
                    <?php $flag = 1; ?>
                @endif
                        </div>
                      </div>
                    </div>
                </div>
              @endforeach
         </div>
    </div>
</div>
</div>

@endsection