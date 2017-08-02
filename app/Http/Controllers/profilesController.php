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
use App\news;
use App\Volunteer;
use App\Member;
use Illuminate\Support\Facades\Cache;


class profilesController extends Controller
{
	public function __construct()
    {
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
		$date = $this->date;
		$available = true;
		$open = false;
		$mine = false;
		$flag = 0;
		$date = $this->date;
		$friend = false;
		$authUser = $this->user;
		try {
		  $user=User::find($userId);
		  $userType = $user->userType;
		  $open = $user->open;
		}
		catch (\Exception $e) {
		    return redirect()->route('errorPage')->withErrors('profile not found.');
		}
		if(Auth::check())
		{
			$friend = Friend::where('requester_id', '=', $authUser->id)->where('requested_id', '=', $userId)->first();
		    if($friend)
		    {
		        $friend = true;
		    }
		    else
		    {
		    	$friend = false;
		    }
		    $userUevents = Event::where('events.user_id',$authUser->id)->where('startDate','>',$date)->get();
		    if(($authUser->userType == $userType) && ($authUser->id == $user->id)){$mine = true;}
		}

		if ($userType==0)
		{
			$user= $user->Individuals;
			if($date > $user->availableFrom && $date < $user->availableTo) $available = false;
			$myevents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$userId)->where('events.endDate','<',$date)->where('accepted',1)->get();
			return view('Indprofile',compact('user','friend','userUevents','userUeventsVolunteers','myevents','open','mine','available'));
		} 

		elseif($userType == 1)
		{

			$user = $user->Institute;

			$Aevents = event::where('user_id', $userId)->where('endDate','<',$date)->paginate(5, ['*'], 'Archived');
			$achievements=news::where('achievement','1')->paginate(5, ['*'], 'achievements');
			$activities=news::where('activity','1')->paginate(5, ['*'], 'activities');


			return view('Insprofile',compact('user','friend','Aevents','userUevents','userUeventsVolunteers','open','mine','achievements','activities'));
		}	
		elseif($userType == 3)
		{
			$joinRequest = false;
			$joined = false;
			$user = $user->Initiative;
			if($date > $user->availableFrom && $date < $user->availableTo) $available = false;
			if($authUser->id == $user->user_id)
			{
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

			return view('initiativeProfile',compact('user','friend','Aevents','userUevents','userUeventsVolunteers','myevents','initiativeVols','initiativeAcceptedVols','joined','mine','joinRequest','open','mine','available'));
		}
		else
			abort(403,'Unauthrized action.');
	}


	public function rate(Request $request,$eventId)
	{	
		dd($request['unaccepted']);
		if($request->has('unaccepted'))
		{					                  

			$date=$this->date;
			$event=Event::where('id',$eventId)->first();
			if($event)
			{

				if($event->endDate < $date)
				{
					$users = DB::table('users')
	                    ->whereIn('id',request('unaccepted'))
	                    ->get();

					foreach ($users as $user) 
					{
						$volunteer=Volunteer::where('user_id',$user->id)->where('event_id',$eventId)->first();
						$user=$user->Individuals;
						if($volunteer)
						{
							if($volunteer->accepted == 1)
							{
								if($user->rated==0)
								{
									$user->cat1=$request['cat1'];
									$user->cat1C+=1;

									$user->cat2=$request['cat2'];
									$user->cat2C+=1;

									$user->cat3=$request['cat3'];
									$user->cat3C+=1;


									$user->cat4=$request['cat4'];
									$user->cat4C=1;

									$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
									$user->acc_avg=$avg;
									$user->acc_avgC+=1;
									$user->rated=1;
									$user->save();
								}
								elseif($user->rated==1)
								{
									$flag = 0;
									if($volunteer->rated == 1 && $flag == 0)
									{
										$cat1 = -1 * abs($volunteer->cat1Rated);
										$cat2 = -1 * abs($volunteer->cat2Rated);
										$cat3 = -1 * abs($volunteer->cat3Rated);
										$cat4 = -1 * abs($volunteer->cat4Rated);

										if($user->cat1C == 1 || $user->cat2C == 1 || $user->cat3C == 1 || $user->cat4C == 1 || $user->acc_avgC == 1)
										{
											$user->cat1=$request['cat1'];
											$user->cat2=$request['cat2'];
											$user->cat3=$request['cat3'];
											$user->cat4=$request['cat4'];

											$user->acc_avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
										}
										else
										{
											$user->cat1C-=1;
											$user->cat1=($cat1/$user->cat1C)+(($user->cat1*($user->cat1C-1))/$user->cat1C);
											$user->cat2C-=1;
											$user->cat2=($cat1/$user->cat2C)+(($user->cat2*($user->cat2C-1))/$user->cat2C);
											$user->cat3C-=1;
											$user->cat3=($cat1/$user->cat3C)+(($user->cat3*($user->cat3C-1))/$user->cat3C);
											$user->cat4C-=1;
											$user->cat4=($cat1/$user->cat4C)+(($user->cat4*($user->cat4C-1))/$user->cat4C);

											$user->acc_avgC-=1;
											$acc_avg = -1 * abs($volunteer->acc_avgRated);
											$user->acc_avg=($acc_avg/$user->acc_avgC)+(($user->acc_avg*($user->acc_avgC-1))/$user->acc_avgC);
											$flag = 1;
										}
										$user->save();
									}
									if($volunteer->rated == 0 || $flag == 1)
									{
										$user->cat1C+=1;
										$user->cat1=($request['cat1']/$user->cat1C)+(($user->cat1*($user->cat1C-1))/$user->cat1C);
										$user->cat2C+=1;
										$user->cat2=($request['cat2']/$user->cat2C)+(($user->cat2*($user->cat2C-1))/$user->cat2C);
										$user->cat3C+=1;
										$user->cat3=($request['cat3']/$user->cat3C)+(($user->cat3*($user->cat3C-1))/$user->cat3C);
										$user->cat4C+=1;
										$user->cat4=($request['cat4']/$user->cat4C)+(($user->cat4*($user->cat4C-1))/$user->cat4C);
										$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;

										$user->acc_avgC+=1;
										$user->acc_avg=($avg/$user->acc_avgC)+(($user->acc_avg*($user->acc_avgC-1))/$user->acc_avgC);
										$user->save();
									}
								}
								$volunteer->rated = 1;
								$volunteer->cat1Rated=$request['cat1'];
								$volunteer->cat2Rated=$request['cat2'];
								$volunteer->cat3Rated=$request['cat3'];
								$volunteer->cat4Rated=$request['cat4'];
								$volunteer->acc_avgRated=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
								$volunteer->save();
								return redirect()->back();
							}
							return redirect()->route('errorPage')->withErrors("Your request not accepted to be volunteer.");
						}
						return redirect()->route('errorPage')->withErrors("You are not volunteer in this event.");
					}
				}
				return redirect()->route('errorPage')->withErrors("This event not finished yet.");
			}
			return redirect()->route('errorPage')->withErrors("This event not found.");
		}
		return redirect()->back();
	}

	public function rateInstitute(Request $request,$eventId)
	{
		$authUser=$this->user;
		$date=$this->date;
		$event=Event::where('id',$eventId)->first();
		if($event)
		{
			if($event->endDate < $date)
			{
				$user=User::findOrFail($event->user_id);
				$user =$user->Institute;
				$volunteer=Volunteer::where('user_id',$authUser->id)->where('event_id',$eventId)->first();
				if($volunteer)
				{
					if($volunteer->accepted == 1)
					{
						if($user->rated==0)
						{
							$user->cat1=$request['cat1'];
							$user->cat1C+=1;

							$user->cat2=$request['cat2'];
							$user->cat2C+=1;

							$user->cat3=$request['cat3'];
							$user->cat3C+=1;


							$user->cat4=$request['cat4'];
							$user->cat4C=1;

							$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
							$user->acc_avg=$avg;
							$user->acc_avgC+=1;
							$user->rated=1;
							$user->save();
						}
						elseif($user->rated==1)
						{
							$flag = 0;
							if($volunteer->rates == 1 && $flag == 0)
							{
								$cat1 = -1 * abs($volunteer->cat1Rates);
								$cat2 = -1 * abs($volunteer->cat2Rates);
								$cat3 = -1 * abs($volunteer->cat3Rates);
								$cat4 = -1 * abs($volunteer->cat4Rates);
								if($user->cat1C == 1 || $user->cat2C == 1 || $user->cat3C == 1 || $user->cat4C == 1 || $user->acc_avgC == 1)
								{
									$user->cat1=$request['cat1'];
									$user->cat2=$request['cat2'];
									$user->cat3=$request['cat3'];
									$user->cat4=$request['cat4'];

									$user->acc_avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
								}
								else
								{
									$user->cat1C-=1;
									$user->cat1=($cat1/$user->cat1C)+(($user->cat1*($user->cat1C-1))/$user->cat1C);
									$user->cat2C-=1;
									$user->cat2=($cat1/$user->cat2C)+(($user->cat2*($user->cat2C-1))/$user->cat2C);
									$user->cat3C-=1;
									$user->cat3=($cat1/$user->cat3C)+(($user->cat3*($user->cat3C-1))/$user->cat3C);
									$user->cat4C-=1;
									$user->cat4=($cat1/$user->cat4C)+(($user->cat4*($user->cat4C-1))/$user->cat4C);

									$user->acc_avgC-=1;
									$acc_avg = -1 * abs($volunteer->acc_avgRates);
									$user->acc_avg=($acc_avg/$user->acc_avgC)+(($user->acc_avg*($user->acc_avgC-1))/$user->acc_avgC);
									$flag = 1;
								}
								$user->save();
							}
							if($volunteer->rates == 0 || $flag == 1)
							{
								$user->cat1C+=1;
								$user->cat1=($request['cat1']/$user->cat1C)+(($user->cat1*($user->cat1C-1))/$user->cat1C);
								$user->cat2C+=1;
								$user->cat2=($request['cat2']/$user->cat2C)+(($user->cat2*($user->cat2C-1))/$user->cat2C);
								$user->cat3C+=1;
								$user->cat3=($request['cat3']/$user->cat3C)+(($user->cat3*($user->cat3C-1))/$user->cat3C);
								$user->cat4C+=1;
								$user->cat4=($request['cat4']/$user->cat4C)+(($user->cat4*($user->cat4C-1))/$user->cat4C);
								$avg=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;

								$user->acc_avgC+=1;
								$user->acc_avg=($avg/$user->acc_avgC)+(($user->acc_avg*($user->acc_avgC-1))/$user->acc_avgC);
								$user->save();
							}
						}
						$volunteer->rates = 1;
						$volunteer->cat1Rates=$request['cat1'];
						$volunteer->cat2Rates=$request['cat2'];
						$volunteer->cat3Rates=$request['cat3'];
						$volunteer->cat4Rates=$request['cat4'];
						$volunteer->acc_avgRates=($request['cat1']+$request['cat2']+$request['cat3']+$request['cat4'])/4.00;
						$volunteer->save();
						return redirect()->back();
					}
					return redirect()->route('errorPage')->withErrors("Your request not accepted to be volunteer.");
				}
				return redirect()->route('errorPage')->withErrors("You are not volunteer in this event.");
			}
			return redirect()->route('errorPage')->withErrors("This event not finished yet.");
		}
		return redirect()->route('errorPage')->withErrors("This event not found.");       
	}

	public function closeProfile()
    {
        if(auth::check())
    	{
	        $user = $this->user;
	        $user->open = false;
	        $user->save();
	        return redirect()->back();
	    }
	    return redirect()->route('errorPage')->withErrors('not yours.');
    }

    public function openProfile()
    {
    	if(auth::check())
    	{
	        $user = $this->user;
	        $user->open = true;
	        $user->save();
	        return redirect()->back();
	    }
	    return redirect()->route('errorPage')->withErrors('not yours.');
    }

    public function availability(Request $request)
    {
    	if(auth::check())
    	{
	        $user = $this->user->Individuals;
	        if($request->has('availableFrom')) $user->availableFrom = $request->availableFrom;
	        if($request->has('availableTo')) $user->availableTo = $request->availableTo;
	        $user->save();
	        return redirect()->back();
	    }
	    return redirect()->route('errorPage')->withErrors('not yours.');
    }
}
