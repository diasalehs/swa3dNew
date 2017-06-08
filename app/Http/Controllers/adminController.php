<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Individuals;
use Illuminate\Support\Facades\auth;
use Illuminate\Database\Query\Builder;

class adminController extends Controller
{
    public function delete($userId)
    {
        $user = User::find($userId);
        if($user->userType== 0){        $user->Individuals()->delete();}
        if($user->userType== 1){        $user->Institute()->delete(); }
        if($user->userType== 2){        $user->Researcher()->delete(); }

        $user->delete();
         return redirect()->route('home');

    	# code...
    }
 public function index()
    {
        if(Auth::attempt() || Auth::user()){
        	$user = Auth::user();
        	$users_record= DB::table('users')->get();
        	if ($user->userType=== 10 ) {
        		return view('admin/adminDashboard',["users_record"=>$users_record]);
        	}
        	else{
                return redirect()->route('home');
            }
        }else{
                return redirect()->route('main');
        }
    }

}