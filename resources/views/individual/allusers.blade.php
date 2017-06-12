@extends('layouts.profileMaster')

@section('content')
<div class="container-fluid" style="margin:120px auto">
    <div class="row">
      @include('includes.sidebar')

            <?php  foreach ($users_record as $user) {
                 echo "<tr>
              <td>".$user->name."</td>
              <td>".$user->email."</td>
              <td>
              <a class='btn btn-success btn-block'  href='allusers/".$user->id."'>follow</a>
              </td>
                </tr>";

              }?>
         </div>
    </div>

@endsection
