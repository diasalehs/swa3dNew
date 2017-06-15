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
class profilesController extends Controller
{
	public function index($userId)
	{	

		$user=User::find($userId);
		$userType=$user->userType;
		if ($userType==0) {
			$user=DB::table('individuals')->where('user_id','=',$userId)->get();
			return view('Indprofile',['user'=>$user]);

			# code...
		} 
		elseif ($userType==1) {
			$user=DB::table('institutes')->where('user_id','=',$userId)->get();
		    return view('Insprofile',['user'=>$user]);

		    # code...
		
		}
		elseif ($userType==2) {
			$user=DB::table('researchers')->where('user_id','=',$userId)->get();
			return view('Resprofile',['user'=>$user]);

			# code...
		
		}



		return view('profile',['user'=>$user]);

		
		# code...
	}
    //
}
