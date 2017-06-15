@extends('institute/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('institute/includes.sidebar')
        <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
          <div class="jumbotron">
             <h1 class="display-4" style="">Hello, {{$user->name}}!</h1>
             <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
             <hr class="my-4">
             <p class="lead">
               <a class="btn btn-primary btn-lg bv" href="{{route('makeEvent')}}" role="button">Make Event</a>
               <a class="btn btn-primary btn-lg mg" href="{{route('findVolunteers')}}" role="button">Find Volunteers</a>
             </p>
           </div>
           <div class="row yrp">
             <div class="col-sm-6 col-xs-6 col-md-6 ">
               <h3>Your Info</h3>
             </div>
             <div class="col-sm-6 col-xs-6 col-md-6 text-xs-right text-md-right text-sm-right">
                <form class="" role="form" method="GET" action="{{route('profileViewEdit')}}">{{ csrf_field() }}
                        <div class="form-group">
                                <button type="submit" class="btn edit-btn">Edit</button>
                        </div>
                </form>
              </div>
           </div>
           <ul class="list-group">
             <li class="list-group-item">Living Place:   {{ ucfirst($userInstitute->livingPlace)}} </li>
             <li class="list-group-item">City Name:   {{ ucfirst($userInstitute->cityName) }} </li>
             <li class="list-group-item">Country Name:    {{ ucfirst($userInstitute->country) }}</li>
             <li class="list-group-item">Work Summary:   {{ ucfirst($userInstitute->workSummary) }} </li>
             <li class="list-group-item">Activities:   {{ ucfirst($userInstitute->activities) }} </li>
             <li class="list-group-item">Mobile Number:   {{$userInstitute->mobileNumber}}</li>
             <li class="list-group-item">Address:    {{$userInstitute->address}}</li>
           </ul>



        </div>

    </div>
</div>

@endsection
