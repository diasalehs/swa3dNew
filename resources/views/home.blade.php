@extends('layouts.app')

@section('content')
<div class="container" style="margin:150px auto">
    <div class="row">
        <div class="col-lg-3">
            <div class="text-center profile-pic"> 
                <img class="  profile-pic" src="vendor/img/user.png">
            </div>
            <ul class="list-group">
                <a href="#" class="list-group-item justify-content-between">Dashbourd   <span class="badge badge-default badge-pill"></span></a>
                <a href="#" class="list-group-item  justify-content-between">Followers    <span class="badge badge-default badge-pill">14</span></a>
                <a href="#" class="list-group-item  justify-content-between">Following    <span class="badge badge-default badge-pill">32</span></a>
                <a href="#" class="list-group-item  justify-content-between">Activities    <span class="badge badge-default badge-pill">4</span></a>
                <a href="#" class="list-group-item  justify-content-between">Messages   <span class="badge badge-default badge-pill">1</span></a>
            </ul>
         </div>
         <div class="col-lg-9">


         </div>
    </div>
</div>

                        <div class="form-group">
                            <div class="col-lg-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
