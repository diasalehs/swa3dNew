@extends('institute/layouts.profileMaster')
@section('title')
  Swa3ed - Home

@endsection
@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <div class="jumbotron" style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)),url({{ URL::to('/vendor/img/newlogo.png')}});
          background-size:cover;background-repeat: no-repeat;
          background-position: right ;
          background-attachment: fixed;
          ">
             <h1 class="display-4 " style="color:#fff">Hello, {{$user->nameInEnglish}}!</h1>
             <p class="lead" style="color:#fff">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
             <hr class="my-4 " style="background-color: #fff">
             <p class="lead">
               <a class="btn btn-lg bv" href="{{route('makeEvent')}}" role="button">Create an Event</a>
               <a class="btn  btn-lg mg" href="{{route('findVolunteers')}}" role="button">Find Volunteers</a>
             </p>
           </div>
           <div class="row yrp" >
             <div class="col-sm-6 col-xs-6 col-md-6 ">
               <h3>Your Info</h3>
             </div>

             <div class="col-sm-6 col-xs-6 col-md-6 text-xs-right text-md-right text-sm-right">
                <form class="" role="form" method="GET" action="{{route('profileViewEdit')}}">
                        <div class="form-group">
                                <button type="submit" class="btn edit-btn">Edit</button>
                        </div>
                </form>
              </div>
           </div>
           <ul class="list-group">
             <li class="list-group-item">Living Place:   {{ ucfirst($user->livingPlace)}} </li>
             <li class="list-group-item">City Name:   {{ ucfirst($user->cityName) }} </li>
             <li class="list-group-item">Country Name:    {{ ucfirst($user->country) }}</li>
             <li class="list-group-item">Work Summary:   {{ ucfirst($user->workSummary) }} </li>
             <li class="list-group-item">Activities:   {{ ucfirst($user->activities) }} </li>
             <li class="list-group-item">Mobile Number:   {{$user->mobileNumber}}</li>
             <li class="list-group-item">Address:    {{$user->address}}</li>
           </ul>



        </div>

    </div>
</div>

@endsection
@section('scripts')

<script>
 $(document).ready(function(){
    $(window).scrollTop(0);
});
</script>

@endsection
