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

                                <button type="submit" value="0" name="submit" class="btn btn-success btn-block">Individual</button>
                            </div>
                        </div>
                 

                            <div class="form-group">
                            <div class="col-lg-4 offset-md-4">
                                <button type="submit" value="1" name="submit" class="btn btn-success btn-block">Institute</button>
                            </div>
                        </div>



                                                <div class="form-group">
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