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
use App\volunteer;

class profilesController extends Controller
{
	public function __construct()
    {
        $this->date = date('Y-m-d');
    }
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
			$Individual=DB::table('Individuals')->where('user_id','=',$userId)->first();
			$date = $this->date;
			$events = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$Individual->id)->where('events.endDate','<',$date)->where('accepted',1)->get();
			return view('Indprofile',['user'=>$user,'Individual'=>$Individual,'friend'=>$friend,'events'=>$events]);

		} 
		elseif ($userType==1) {
			$Institute=DB::table('Institutes')->where('user_id','=',$userId)->get();
		    return view('Insprofile',['user'=>$user,'Institute'=>$Institute,'flag'=>$friend]);

		
		}
		elseif ($userType==2) {
			$researcher=DB::table('researchers')->where('user_id','=',$userId)->get();
			return view('Resprofile',['user'=>$user,'researcher'=>$friend,'flag'=>$friend]);

			# code...
		
		}



		return view('profile',['user'=>$user,'flag'=>$flag]);

		
		# code...
	}
	public function rank(Request $request,$id)
	{	$usere=user::find($id);
		if($usere->userType==0){
		$user =Individuals::find($id);
		$user->cat1=($user->cat1+$request['cat1'])/2.00;
		$user->cat2=($user->cat2+$request['cat2'])/2.00;
		$user->cat3=($user->cat3+$request['cat3'])/2.00;
		$user->cat4=($user->cat4+$request['cat4'])/2.00;
		$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
		$user->acc_avg=($user->acc_avg + $avg)/2.00;
		$user->save();
	}
		elseif($usere->userType==1){
		$user =Institute::find($id);
		$user->cat1=($user->cat1+$request['cat1'])/2.00;
		$user->cat2=($user->cat2+$request['cat2'])/2.00;
		$user->cat3=($user->cat3+$request['cat3'])/2.00;
		$user->cat4=($user->cat4+$request['cat4'])/2.00;
		$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
		$user->acc_avg=($user->acc_avg + $avg)/2.00;
		$user->save();
	}

	
        return redirect()->back();
		# code...
	}
    //
}
