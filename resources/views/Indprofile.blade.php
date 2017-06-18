@extends('layouts.master')

@section('content')

<div class="viewProfile">
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <div class=" circular--landscape">
          <img class="profile-pic text-center" src="{{ URL::to('/') }}/pp/{{$Individual[0]->picture}}">
      </div>

      <h1 class="display-7">{{$Individual[0]->nameInEnglish}}</h1>
      <p class=""><span>Volunteer</span> <span>{{$Individual[0]->country}}</span> <span>{{$Individual[0]->cityName}}</span> </p>  

      @if(Auth::guest())
             <a class='btn btn-green'  href="{{route('login')}}">follow</a>
      @else
        @if($friend)
             <a class='btn btn-green'  href="{{route('unfollow',$user->id)}}">unfollow</a>
        @elseif(!$friend)
             <a class='btn btn-green'  href="{{route('follow',$user->id)}}">follow</a>
        @endif
      @endif

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
                    Gender: {{$Individual[0]->gender}}<br>
                    Birth Date: {{$Individual[0]->dateOfBirth}}<br>
                    Education: {{$Individual[0]->educationalLevel}}<br>
                    Current Work: {{$Individual[0]->currentWork}}<br>
                    Availabel from: {{$Individual[0]->availableFrom}} to: {{$Individual[0]->availableTo}}<br>
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
                    Email: {{$Individual[0]->email}}<br>
                    Adress: {{$Individual[0]->address}}<br>
                    Mobile number: {{$Individual[0]->mobileNumber}}<br>
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
                      <td>{{$Individual[0]->voluntaryYears}}</td>
                    </tr>
                    <tr>
                      <td>cat1</td>
                      <td>{{$Individual[0]->cat1}}</td>
                    </tr>
                    <tr>
                      <td>cat2</td>
                      <td>{{$Individual[0]->cat2}}</td>
                    </tr>
                     <tr>
                      <td>cat3</td>
                      <td>{{$Individual[0]->cat3}}</td>
                    </tr>
                     <tr>
                      <td>cat4</td>
                      <td>{{$Individual[0]->cat4}}</td>
                    </tr>
                     <tr>
                      <td>acc </td>
                      <td>{{$Individual[0]->acc_avg}}</td>
                    </tr>
                    <tr>
                      <td> </td>
                      <td>
                      {{-- @if(auth::check()) --}}
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                       Rate!
                      </button>
                      {{-- @endif --}}
                    </td>
                    </tr>

                     


                  </tbody>
                </table>
              </div>
              </div>
          </div>
        </div>
      </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('rank',$Individual[0]->id)}}" method="get">
      <div class="modal-body">
        <label>cat1</label>
        <input type="text" name="cat1"><br>
        <label>cat2</label>
        <input type="text" name="cat2"><br>
        <label>cat3</label>
        <input type="text" name="cat3"><br>
        <label>cat4</label>
        <input type="text" name="cat4"><br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary">Save</button>

      </div>
      </form>

    </div>
  </div>
</div>
@endsection('content')
