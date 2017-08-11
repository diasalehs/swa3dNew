@extends('layouts.app')
 @section('content')
<div class="container" style=" margin-top:120px; margin-bottom:50px">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                  <div class="row justify-content-center">

                    <a class="btn  choose-btn "  href="{{route('registerer',0)}}">Individual</a>
                    <a class="btn  choose-btn "  href="{{route('registerer',1)}}">Institute</a>



                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
