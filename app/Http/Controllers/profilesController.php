<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\Individuals;
use App\Institute;
use App\Initiative;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\Event;
use App\Volunteer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;


class profilesController extends Controller
{
	public function __construct()
    {
        $this->date = date('Y-m-d');
    }

	public function index($userId)
	{	

	$flag = 0;
	$date = $this->date;
	if(Auth::check()){
		$user = Auth::user();
		$friend = false;
		$following = Friend::where('requester_id',$user->id)->where('requested_id',$userId)->first();
	    if($following == null)
	    {
	        $friend = false;
	    }
	    else 
	    	$friend = true;
	    $userUevents = event::where('events.user_id',$user->id)->where('startDate','>',$date)->get();
	}

    try {
	  $user=User::find($userId);
	  $userType = $user->userType;
	}
	catch (\Exception $e) {
	    return redirect()->route('errorPage')->withErrors('profile not found.');
	}
	if ($userType==0)
	{
		$user= $user->Individuals;
		$myevents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$userId)->where('events.endDate','<',$date)->where('accepted',1)->get();
		return view('Indprofile',compact('user','Individual','friend','userUevents','userUeventsVolunteers','myevents'));
	} 

	elseif($userType == 1)
	{
		$user = $user->Institute;

		$Aevents = event::where('user_id', $userId)->where('endDate','<',$date)->get();

		$Institute= Institute::where('user_id','=',$userId)->get();

    	return view('Insprofile',compact('user','Institute','friend','Aevents','userUevents','userUeventsVolunteers'));
	}	
    elseif($userType == 3)
    {
    	$user= $user->Initiative;

    	$Aevents = event::where('user_id', $userId)->where('endDate','<',$date)->get();

    	$myevents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$userId)->where('events.endDate','<',$date)->where('accepted',1)->get();

    	$Initiative= Initiative::where('user_id','=',$userId)->get();

    	return view('initiativeProfile',compact('user','Initiative','friend','Aevents','userUevents','userUeventsVolunteers','myevents'));
    }
	else
		abort(403,'Unauthrized action.');
	}


	public function rank(Request $request,$id)
	{	
		$usere=user::find($id);
		if($usere->userType==0){

			$user =$usere->Individuals;

			if($user->rated==0){

				$user->cat1=$request['cat1'];
				$user->cat2=$request['cat2'];
				$user->cat3=$request['cat3'];
				$user->cat4=$request['cat4'];
				$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
				$user->acc_avg=$avg;
				$user->rated=1;
				$user->save();
				
			}

			else{
				$user->cat1=($user->cat1+$request['cat1'])/2.00;
				$user->cat2=($user->cat2+$request['cat2'])/2.00;
				$user->cat3=($user->cat3+$request['cat3'])/2.00;
				$user->cat4=($user->cat4+$request['cat4'])/2.00;
				$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
				$user->acc_avg=($user->acc_avg + $avg)/2.00;
				$user->save();
			}
			
	}
		elseif($usere->userType==1){
			if($user->rated==0){
				$user->cat1=$request['cat1'];
				$user->cat2=$request['cat2'];
				$user->cat3=$request['cat3'];
				$user->cat4=$request['cat4'];
				$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
				$user->acc_avg=$avg;
				$user->rated=1;
				$user->save();
			}
 

			else{
				$user =$user->Institute;
				$user->cat1=($user->cat1+$request['cat1'])/2.00;
				$user->cat2=($user->cat2+$request['cat2'])/2.00;
				$user->cat3=($user->cat3+$request['cat3'])/2.00;
				$user->cat4=($user->cat4+$request['cat4'])/2.00;
				$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
				$user->acc_avg=($user->acc_avg + $avg)/2.00;
				$user->save();
			}
			
	}

	 return redirect()->back();
       
	}
}
