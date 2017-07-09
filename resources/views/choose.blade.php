@extends('layouts.app')
 @section('content')
<div class="container" style=" margin-top:120px; margin-bottom:50px">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">
                  <div class="row justify-content-center">

                    <form class="" role="form" method="POST" action="{{ route('registerer') }}">{{ csrf_field() }}
                            <div class="form-group">
                            <div class=" ">

                                <button type="submit" value="0" name="submit" class="btn btn-success choose-btn ">Individual</button>
                            </div>
                        </div>


                            <div class="form-group">
                            <div class=" ">
                                <button type="submit" value="1" name="submit" class="btn btn-success choose-btn ">Institute</button>
                            </div>
                        </div>
                    </form>



                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
