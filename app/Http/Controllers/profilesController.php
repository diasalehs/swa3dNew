<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Individuals;
use App\Institute;
use App\Resercher;
use App\User;
use Illuminate\Support\Facades\auth;
use App\friend;
class profilesController extends Controller
{
	public function index($userId)
	{	

	$flag = 0;
	if(Auth::attempt() || Auth::user()){
		$u = Auth::user();
		$following = friend::where('requester_id',$u->id)->where('requested_id',$userId)->first();
	    if($following == null){
	        $friend = false;
	        $flag = 1;
	    }
	}
	    if($flag == 0){
	      	$friend = true;
	    }


		$user=User::find($userId);
		$userType=$user->userType;
		if ($userType==0) {
			$Individual=DB::table('Individuals')->where('user_id','=',$userId)->get();
			return view('Indprofile',['user'=>$user,'Individual'=>$Individual,'friend'=>$friend]);

			# code...
		} 
		elseif ($userType==1) {
			$Institute=DB::table('Institutes')->where('user_id','=',$userId)->get();
		    return view('Insprofile',['user'=>$user,'Institute'=>$friend,'flag'=>$friend]);

		    # code...
		
		}
		elseif ($userType==2) {
			$researcher=DB::table('researchers')->where('user_id','=',$userId)->get();
			return view('Resprofile',['user'=>$user,'researcher'=>$friend,'flag'=>$friend]);

			# code...
		
		}



		return view('profile',['user'=>$user,'flag'=>$flag]);

		
		# code...
	}
    //
}
