<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\news;
use App\Individuals;
use App\slider;
use App\event;
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
        $events = event::where('startDate','>',$date)->get();

    	if (Auth::attempt()||$user) {
    	$Iuser=$user->Individuals;
        $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->get();
		return view('upComingEvents',compact('events','localevents'));
    	}   
		return view('upComingEvents',compact('events'));

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
