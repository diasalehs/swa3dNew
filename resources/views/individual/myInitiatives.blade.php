@extends('individual/layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('individual/includes.sidebar')
         <div class="col-sm-12  col-md-8  col-lg-9" style="color: #333">
           <h1>My Initiatives</h1>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($myInitiatives as $myInitiative)
                      <tr>
                      <td>{{$myInitiative->nameInEnglish}}</td>
                      <td>{{$myInitiative->email}}</td>
                      <td>
                        <a class='btn btn-danger'  href="{{route('editInitiative',$myInitiative->id)}}">edit</a>
                      </td>
                      </tr>
                @endforeach
              </tbody>
          </table>

         </div>
  </div>
</div>
@endsection

