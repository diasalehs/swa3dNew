
@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <div class="jumbotron" style="background-image: linear-gradient(rgba(19, 58, 83, 0.6),rgba(19, 58, 83, 0.6)),url({{ URL::to('/vendor/img/newlogo.png')}});
           background-size:contain;background-repeat: no-repeat;
           background-position: right top;
           background-attachment: fixed;
           ">
              <h1 class="display-4" style="color:#fff">Hello, {{$user->name}}!</h1>
              <p class="lead"style="color:#fff">This is a V simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
              <hr class="my-4"style="background-color: #fff">
              <p class="lead">
                <a class="btn btn-primary btn-lg bv" href="{{route('upComingEvents')}}" role="button">Volunteer Now</a>
                <a class="btn btn-primary btn-lg mg" href="{{route('makeInitiative')}}" role="button">Make Initiative</a>

                @if(auth::user()->Individuals->researcher==0)

                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                              <a class="btn btn-primary" href="{{route('researcher')}}" role="button">agree</a>



                          </div>
                        </div>
                      </div>
                    </div>
                @endif
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
              <li class="list-group-item">Living Place:   {{ ucfirst($userIndividual->livingPlace)}} </li>
              <li class="list-group-item">City Name:   {{ ucfirst($userIndividual->cityName) }} </li>
              <li class="list-group-item">Country Name:    {{ ucfirst($userIndividual->country) }}</li>
              <li class="list-group-item">Current Work:   {{ ucfirst($userIndividual->currentWork) }} </li>
              <li class="list-group-item">Educational Level:   {{ ucfirst($userIndividual->educationalLevel) }} </li>
              <li class="list-group-item">Voluntary Experiance:   {{$userIndividual->voluntaryYears}}</li>
              <li class="list-group-item">Date Of Birth:    {{$userIndividual->dateOfBirth}}</li>
            </ul>



         </div>
    </div>
</div>

@endsection
