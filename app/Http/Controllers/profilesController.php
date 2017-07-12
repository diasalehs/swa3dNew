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
use App\Member;
use Illuminate\Support\Facades\Cache;


class profilesController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
            $this->date = $date;
            $this->user = $user;
            return $next($request);
        });
    }

	public function index($userId)
	{	

	$flag = 0;
	$date = $this->date;
	$friend = false;
	if(Auth::check())
	{
		$authUser = $this->user;
		$friend = Friend::where('requester_id', '=', $authUser->id)->where('requested_id', '=', $userId)->first();
	    if($friend)
	    {
	        $friend = true;
	    }
	    else
	    {
	    	$friend = false;
	    }
	    $userUevents = event::where('events.user_id',$authUser->id)->where('startDate','>',$date)->get();
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
		return view('Indprofile',compact('user','friend','userUevents','userUeventsVolunteers','myevents'));
	} 

	elseif($userType == 1)
	{
		$user = $user->Institute;

		$Aevents = event::where('user_id', $userId)->where('endDate','<',$date)->get();

    	return view('Insprofile',compact('user','friend','Aevents','userUevents','userUeventsVolunteers'));
	}	
    elseif($userType == 3)
    {
    	$mine = false;
    	$joinRequest = false;
    	$joined = false;
    	$user = $user->Initiative;

    	if($authUser->userType == 3 && $authUser->id == $user->user_id)
    	{
    		$mine = true;
    		$initiativeVols = Member::join('users','members.individual_id','=','users.id')->where('initiative_id',$user->user_id)->where('accepted',0)->get();
    	}

    	$initiativeAcceptedVols = Member::where('initiative_id',$user->user_id)->where('individual_id',$authUser->id)->first();

    	if($authUser->userType == 0 && $initiativeAcceptedVols)
    	{
    		$joinRequest = true;
    	}

    	$initiativeAcceptedVols = Member::where('initiative_id',$user->user_id)->where('individual_id',$authUser->id)->where('accepted',1)->first();

    	if($authUser->userType == 0 && $initiativeAcceptedVols)
    	{
    		$joinRequest = true;
    		$joined = true;
    	}

    	$initiativeAcceptedVols = Member::join('users','members.individual_id','=','users.id')->where('initiative_id',$user->user_id)->where('accepted',1)->get();

    	$Aevents = event::where('user_id', $userId)->where('endDate','<',$date)->get();

    	$myevents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$userId)->where('events.endDate','<',$date)->where('accepted',1)->get();

    	return view('initiativeProfile',compact('user','friend','Aevents','userUevents','userUeventsVolunteers','myevents','initiativeVols','initiativeAcceptedVols','joined','mine','joinRequest'));
    }
	else
		abort(403,'Unauthrized action.');
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
	}
}
