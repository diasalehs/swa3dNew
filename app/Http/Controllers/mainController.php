<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\news;
use App\Individuals;
use App\slider;
use App\event;
use App\volunteer;
use App\UserIntrest;
class mainController extends Controller
{

	public function __construct()
    {
            $this->date = date('Y-m-d');
    }

	public function main() {
		// if(Auth::attempt() || Auth::user()){
		// 	if(Auth::user()->flag == 0){
		// 		return redirect()->route('step');
		// 	}elseif(Auth::user()->flag == 1){
		// 		return view('main');
		// 	}
		// }else{

		$_3slides=slider::orderBy('created_at','desc')->take(3)->get();
		$volunteers=Individuals::orderBy('created_at','desc')->take(5)->get();
		$news_record=news::orderBy('created_at','desc')->take(3)->get();
         return view('main',compact('volunteers','_3slides','news_record'));

		// }
	}

	public function upComingEvents(Request $request) {
        $user = Auth::user();
        $date = $this->date;
        $events = new event;
        $events = event::where('startDate','>',$date)->paginate(5,['*'],'events');
        if(request()->has('location')){
             if(request()->has('cat')){
             $events= DB::table("events")->join('event_intrests', function ($join) {
             $join->on('events.id', '=', 'event_intrests.event_id')
                  ->where([['event_intrests.intrest_id', '=', request('cat')],['events.startDate','>',$this->date],['events.country','=',request('location')]]);})->paginate(5,['*'],'events');
         }
         else{$events = event::where([['startDate','>',$date],['country','=',$request['location']]])->paginate(5,['*'],'events');} 
         }
        // ['event_intrests.intrest_id', '=', request('cat')[x]],

        if (Auth::check()) {
            if($user->userType==0){
            $Iuser=$user->Individuals;

            } 
            elseif ($user->userType==1) {
            $Iuser=$user->Institute;

                # code...
              } 
            elseif ($user->userType==2) {
            $Iuser=$user->Researcher;

                # code...
              }
           $userevent= DB::table('user_intrests')->join('event_intrests', function ($join) {
            $join->on('user_intrests.intrest_id', '=', 'event_intrests.intrest_id')
                 ->where('user_intrests.user_id', '=', auth::user()->id);
        })
        ->get();
            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->paginate(5,['*'],'areaEvents');
            $volEvents = volunteer::where('individual_id', $Iuser->id)->get();
            return view('upComingEvents',compact('events','localevents','volEvents','user','userevent'));
        }   
        return view('upComingEvents',compact('events'));

    }
    public function allLocal() {
        $user = Auth::user();
        $date = $this->date;

        if (Auth::check()) {
            if($user->userType==0){
            $Iuser=$user->Individuals;

            } 
            elseif ($user->userType==1) {
            $Iuser=$user->Institute;

                # code...
              } 
            elseif ($user->userType==2) {
            $Iuser=$user->Researcher;

                # code...
              } 
            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->paginate(10,['*'],'areaEvents');
            $volEvents = volunteer::where('individual_id', $Iuser->id)->get();
            return view('allLocal',compact('localevents','volEvents','user'));
        }   

    }
    public function allEvents() {
        $user = Auth::user();
        if($user->userType==0){
            $Iuser=$user->Individuals;
        } 
        $date = $this->date;
        $volEvents = volunteer::where('individual_id', $Iuser->id)->get();
        $events = event::where('startDate','>',$date)->paginate(10,['*'],'events');
        return view('allEvents',compact('events','volEvents','user'));
    }

	public function archiveEvents() {
    	$user = Auth::user();
    	$date = $this->date;
    	$events = event::where('startDate','<',$date)->get();
		return view('archiveEvents',compact('events'));
	}

	public function event($eventId){
    	$event = event::find($eventId);
        $date = $this->date;
        if($event){
        	if(Auth::check()){
        		$user = Auth::user();
                $mine = false;
                $request = false;
                $eventCloseAllowed = false;
                $eventAcceptedVols = volunteer::where('event_id',$eventId)->where('accepted',1)->get();
        		if($user->userType == 1 && $event->user_id == $user->id){
        			$mine = true;
                    $eventVols = volunteer::where('event_id',$eventId)->where('accepted',0)->get();
                    $Individuals = Individuals::all();
                    return view('event',compact('date','event','request','mine','user','eventVols','eventAcceptedVols','Individuals','eventCloseAllowed'));
        		}elseif ($user->userType == 0) {
                    $individual = $user->Individuals;
                    $flag = volunteer::where('event_id',$eventId)->where('individual_id',$individual->id)->where('accepted',1)->first();
                    if($flag){
                        $eventCloseAllowed = true;
                    }
                    $volunteer = volunteer::where('event_id',$eventId)->where('individual_id',$individual->id)->first();
                    if($volunteer){
                        $request = true;
                    }
                }
                return view('event',compact('date','event','eventCloseAllowed','eventAcceptedVols','mine','request','user'));
        	}
            return view('event',compact('date','event','eventAcceptedVols','eventCloseAllowed'));
        }else{
            return redirect()->route('upComingEvents');
        }

	}
}
