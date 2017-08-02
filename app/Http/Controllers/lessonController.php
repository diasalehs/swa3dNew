<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Volunteer;
use App\Event;
use App\Lesson;
use App\Review;

class lessonController extends Controller
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
        $review = Review::where('event_id',$eventId)->where('user_id',$user->id)->first();
        $lesson = Lesson::where('event_id',$eventId)->where('user_id',$event->user_id)->first();
        if($accepted || ($event->user_id == $user->id))
        {
	        if($review == null)
            {
                $review = new Review();
                if($request->goals == 0) $lesson->noGoalsCounter++;
                elseif($request->goals == 1) $lesson->yesGoalsCounter++;
                $lesson->save();
            }
	        $review->event_id = $eventId;
	        $review->user_id = $user->id;
	        $review->positive = $request['positive'];
	        $review->negative = $request['negative'];
	        $review->save();
	        return redirect()->back();
	    }
	    return redirect()->route('errorPage')->withErrors("You are not a Volunteer in this event.");
    }

    public function lesson(Request $request, $eventId)
    {
        $user = $this->user;
        $event = Event::findOrFail($eventId);
        $lesson = Lesson::where('event_id',$eventId)->where('user_id',$user->id)->first();
        if($event->user_id == $user->id)
        {
            $lesson->lessons = $request['lessons'];
            $lesson->save();
            return redirect()->back();
        }
        return redirect()->route('errorPage')->withErrors("You are not a Volunteer in this event.");
    }
}
