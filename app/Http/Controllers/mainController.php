<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
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

	public function upComingEvents() {
        $user = Auth::user();
        $date = $this->date;
        $events = event::where('startDate','>',$date)->paginate(5,['*'],'events');

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
            $userintrest=UserIntrest::where('user_id','=',auth::user()->id)->get();
            $userevent=DB::table($userintrest)->join('event_Intrests','intrest_id','=','event_Intrests.intrest_id');
            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->paginate(5,['*'],'areaEvents');
            $volEvents = volunteer::where('individual_id', $Iuser->id)->get();
            return view('upComingEvents',compact('events','localevents','volEvents','user'));
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
    	$flag = false;
    	if(Auth::attempt() || Auth::user()){
    		$user = Auth::user();
    		if($user->userType == 1 && $event->user_id == $user->id){
    			$flag = true;
    		}
    	}
		return view('event',compact('event','flag'));
	}
}
