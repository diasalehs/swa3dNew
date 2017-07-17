<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Volunteer;
use App\Event;
use App\Lesson;

class lessonsController extends Controller
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

    public function review(Request $request, $eventId)
    {
        $user = $this->user;
        $accepted = Volunteer::where('user_id',$user->id)->where('event_id',$eventId)->where('accepted',1)->first();
        $event = Event::findOrFail($eventId);
        $lessons = Lesson::where('event_id',$eventId)->where('user_id',$user->id)->first();
        if($accepted || ($event->user_id == $user->id))
        {
	        if($lessons == null) $lessons = new Lesson();
	        $lessons->event_id = $eventId;
	        $lessons->user_id = $user->id;
	        $lessons->positive = $request['positive'];
	        $lessons->negative = $request['negative'];
	        $lessons->save();
	        return redirect()->back();
	    }
	    return redirect()->route('errorPage')->withErrors("You are not a Volunteer in this event.");
    }
}
