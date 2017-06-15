@extends('layouts.master')

@section('content')

<div class="viewProfile">
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <div class=" circular--landscape">
          <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$user[0]->picture}}">
      </div>
      <h1 class="display-7">{{$user[0]->nameInEnglish}}</h1>
      <p class=""><span>Volunteer</span> <span>{{$user[0]->country}}</span> <span>{{$user[0]->cityName}}</span> </p>
       <p class="lead ">
         <a class="btn btn-green" href="#" role="button"><i class="fa fa-user-plus" aria-hidden="true"></i>  Follow</a>
       </p>
    </div>
  </div>
  <div class="container">
    <div class="row">

        <div class="col-8">


                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">User Informations</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                    Gender: {{$user[0]->gender}}<br>
                    Birth Date: {{$user[0]->dateOfBirth}}<br>
                    Education: {{$user[0]->educationalLevel}}<br>
                    Current Work: {{$user[0]->currentWork}}<br>
                    Availabel from: {{$user[0]->availableFrom}} to: {{$user[0]->availableTo}}<br>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <br>
                <div class="card">
                  <div class="card-block">
                    <h4 class="card-title">Contact Informations</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                    Email: {{$user[0]->email}}<br>
                    Adress: {{$user[0]->address}}<br>
                    Mobile number: {{$user[0]->mobileNumber}}<br>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
                <br>


          </div>
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                Dashboard
              </div>
              <div class="card-block dcb">
                <table class="table">

                  <tbody>
                    <tr>
                      <td>Voluntary years</td>
                      <td>{{$user[0]->voluntaryYears}}</td>
                    </tr>
                    <tr>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>


                  </tbody>
                </table>
              </div>
              </div>
          </div>
        </div>
      </div>
</div>


@endsection('content')
