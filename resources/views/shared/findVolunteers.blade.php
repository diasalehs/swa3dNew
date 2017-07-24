@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <h1 class="greencolor">All Volunteers</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($users_record as $user)
                      <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                <?php $flag = 0; ?>
                @foreach($following as $followi)
                  @if($followi->requested_id == $user->id)
                               <a class='btn btn-pink'  href="{{route('unfollow',$user->id)}}">Unfollow</a>
                    <?php $flag = 1; ?>
                    @endif
                @endforeach
                @if($flag == 0)
                               <a class='btn btn-green'  href="{{route('follow',$user->id)}}">follow</a>
                    <?php $flag = 1; ?>
                @endif
                      </td>
                      </tr>
                @endforeach
              </tbody>
          </table>


        </div>
      </div>
    </div>
</div>

@endsection
