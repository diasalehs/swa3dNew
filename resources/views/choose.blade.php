@extends('layouts.app')
 @section('content')
<div class="container" style="margin:100px auto">
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-block">

                    <form class="" role="form" method="POST" action="{{ route('registerer') }}">{{ csrf_field() }}
                            <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
<<<<<<< HEAD
                                <button value="0" type="submit" class="btn btn-success btn-block">Individual</button>
                            </div>
                        </div>
=======
                                <button type="submit" value="0" name="submit" class="btn btn-success btn-block">Individual</button>
                            </div>
                        </div>
                 
>>>>>>> d3be5856cce09b7bc152d8e9fdf353e32f3383ca

                            <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" value="1" name="submit" class="btn btn-success btn-block">Institute</button>
                            </div>
                        </div>

<<<<<<< HEAD
                            <div class="form-group">
=======

                                                <div class="form-group">
>>>>>>> d3be5856cce09b7bc152d8e9fdf353e32f3383ca
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" value="2" name= "submit" class="btn btn-success btn-block">Researcher</button>
                            </div>
                        </div>
                    </form>

  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection