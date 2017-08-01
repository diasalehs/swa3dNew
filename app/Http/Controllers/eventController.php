<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Volunteer;
use App\Event;
use App\targetedGroups;
use App\EventIntrest;
use App\EventTarget;
use App\Friend;
use App\Invite;
use App\Intrest;
use App\Lesson;
use App\Review;

class eventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
            $this->date = $date;
            $this->user = $user;
            return $next($request);
        });
    }

    public function slidbare()
    {
        $date = $this->date;
        $user = $this->user;
        return [$user ,$date];
    }

    public function invite(Request $request,$userId=false)
    {
        if($request->has('invitedEvent'))
        {
            if(!is_array($request->invitedEvent))
            {
                $request->invitedEvent = array($request->invitedEvent);
            }
            $forFlag = false;
            if($userId != false)
            {
                $request->invited = $userId;
            }
            for($j=0 ;$j < sizeof($request->invited) ;$j++)
            {
                for($i=0 ;$i < sizeof($request->invitedEvent) ;$i++)
                {   
                    $eventId = $request->invitedEvent[$i];
                    $user = $this->user;
                    $mine = event::where('id',$eventId)->where('user_id',$user->id)->first();
                    if($mine)
                    {
                        $user = user::where('id',$request->invited[$j])->first();
                        if($user)
                        {
                            if($user->userType == 0 || $user->userType == 3){
                                $forFlag = true;
                                $flag = 0;
                                $preInv = invite::where('event_id',$eventId)->where('user_id',$user->id)->first();
                                $preVol = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->first();
                                if($preVol || $preInv)
                                {
                                    continue;
                                }
                                $invite = new invite();
                                $invite->event_id = $eventId;
                                $invite->user_id = $user->id;
                                $invite->save();
                                continue;
                            }else
                                return redirect()->route('errorPage')->withErrors("You can't send an invitation.");
                        }else
                            return redirect()->route('errorPage')->withErrors("profile not found.");
                    }else
                        return redirect()->route('errorPage')->withErrors("this event not yours.");
                }
            }
            if($forFlag)
            {
                return redirect()->route('upComingEvents');
            }
        }
        return redirect()->back();
    }

    public function eventPosts($eventId)
    {
        list($user ,$date)=$this->slidbare();
        $event = event::find($eventId);
        $mine = false;
        $eventCloseAllowed = flase;
        $lesson = null;
        $archived = 0;
        $request = false;

        if($event)
        {
            if($event->user_id == $user->id) $mine = true;
            $flag = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->where('accepted',1)->first();
            if($flag) $eventCloseAllowed = true;
            if($event->open || $eventCloseAllowed || $mine)
            {
                $posts = post::where('event_id',$eventId)->get();
                return view('evens/eventPosts',compact('event','mine','eventCloseAllowed',''));
            }
            return redirect()->route('errorPage')->withErrors("this event is private.");
        }
        return redirect()->route('errorPage')->withErrors("this event not found.");
    }

    public function eventReviews($eventId)
    {
        list($user ,$date)=$this->slidbare();
        $event = event::find($eventId);
        if($event)
        {
            $posts = post::where('event_id',$eventId)->get();
        }
    }

    public function acceptedVolunteers($eventId)
    {
        list($user ,$date)=$this->slidbare();
        $event = Event::findOrFail($eventId);
        dd($event);
    }

    public function unacceptedVolunteers($eventId)
    {
        list($user ,$date)=$this->slidbare();
        $event = Event::findOrFail($eventId);
        dd($event);
    }

    public function rateVolunteers($eventId)
    {
        list($user ,$date)=$this->slidbare();
        $event = Event::findOrFail($eventId);
        dd($event);
    }

    public function makeEvent(){
        list($user ,$date)=$this->slidbare();
        if($user->userType == 1 || $user->userType == 3)
        {
            $intrests=intrest::get();
            $targets=targetedGroups::get();
            $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
            $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
            return view('events/makeEvent',compact('user','Aevents','Uevents','intrests','targets'));
        }
        return abort(403, 'Unauthorized action.');
    }

    public function makeEventPost(Request $request){
        list($user ,$date)=$this->slidbare();
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'country' => 'required|string',
            'startDate' => 'required|date|after:today',
            'endDate' => 'required|date|after:startDate',
        ]);
        $event = new event();
        $event->title = $request['title'];
        $event->user_id = $user->id;
        $event->description = $request['description'];
        $event->country = $request['country'];
        $event->city = $request['cityName'];
        $event->startDate = $request['startDate'];
        $event->endDate = $request['endDate'];
        $event->open = $request['open'];
        if ($request->hasFile('cover')){
            $mainImg=$request->file('cover');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('events/'.$imagename));
            $event->cover = $imagename;
        }
        $event->save();

        $lesson = Lesson::where('event_id',$event->id)->where('user_id',$user->id)->first();
        if($event->user_id == $user->id)
        {
            if($lesson == null) $lesson = new Lesson();
            $lesson->event_id = $event->id;
            $lesson->user_id = $user->id;
            $lesson->goals = $request['goals'];
            $lesson->save();
        }

        foreach ($request['intrests'] as $i) {
            $eveint= new  EventIntrest();
            $eveint->event_id=$event->id;
            $eveint->intrest_id=$i;
            $eveint->save();       
        }
        foreach ($request['targets'] as $t) {
            $evetarget= new EventTarget();
            $evetarget->event_id=$event->id;
            $evetarget->target_id=$t;
            $evetarget->save();     
        }
        return redirect()->route('event',compact('event'));
    }

    public function myEvents(){
        list($user ,$date)=$this->slidbare();
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date)->get();
        return view('events/myEvents',compact('user','Aevents','Uevents'));
    }

    public function archiveMyEvents() {
        list($user ,$date)=$this->slidbare();
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        return view('events/archiveMyEvents',compact('user','Aevents','Uevents'));
    }

    

    public function eventDelete($eventId){
        list($user ,$date)=$this->slidbare();
        $event = event::find($eventId);
        if($event){
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    EventTarget::where('event_id',$event->id)->delete();
                    EventIntrest::where('event_id',$event->id)->delete();
                    Lesson::where('event_id',$event->id)->delete();
                    Review::where('event_id',$event->id)->delete();
                    Volunteer::where('event_id',$event->id)->delete();
                    $event->delete();
                }
            }
        }
        return redirect()->route('myEvents');
    }

    public function eventEdit($eventId){
        list($user ,$date)=$this->slidbare();
        $event = Event::find($eventId);
        if($event){
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    $intrests=intrest::get();
                    $targets=targetedGroups::get();
                    $lesson = Lesson::where('event_id',$event->id)->where('user_id',$user->id)->first();
                    $Aevents = Event::where('user_id', $user->id)->where('startDate','<',$date);
                    $Uevents = Event::where('user_id', $user->id)->where('startDate','>',$date);
                    return view('events/eventEdit',compact('event','user','Uevents','Aevents','targets','intrests','lesson'));
                }
            }
        }
        return redirect()->route('home');
    }

    public function eventEditPost(Request $request){
        list($user ,$date)=$this->slidbare();
        $this->validate($request, [
            'eventId' => 'required',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'startDate' => 'required|date|after:today',
            'endDate' => 'required|date|after:startDate',
        ]);

        $eventId = $request['eventId'];
        $event = event::find($eventId);
        if($event)
        {
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    $event->title = $request['title'];
                    $event->country = $request['country'];
                    $event->city = $request['cityName'];
                    $event->user_id = $user->id;
                    $event->description = $request['description'];
                    $event->startDate = $request['startDate'];
                    $event->endDate = $request['endDate'];
                    $event->save();

                    $lesson = Lesson::where('event_id',$event->id)->where('user_id',$user->id)->first();
                    if($event->user_id == $user->id)
                    {
                        if($lesson)
                        {
                            $lesson->event_id = $event->id;
                            $lesson->user_id = $user->id;
                            $lesson->goals = $request['goals'];
                            $lesson->save();
                        }
                    }

                    EventIntrest::where('event_id',$event->id)->delete();
                    foreach ($request['intrests'] as $i) {
                        $eveint= new  EventIntrest();
                        $eveint->event_id=$event->id;
                        $eveint->intrest_id=$i;
                        $eveint->save();       
                    }

                    EventTarget::where('event_id',$event->id)->delete();
                    foreach ($request['targets'] as $t) {
                        $evetarget= new EventTarget();
                        $evetarget->event_id=$event->id;
                        $evetarget->target_id=$t;
                        $evetarget->save();     
                    }

                    return redirect()->route('event',compact('event'));
                }
            }
        }
        return redirect()->back();
    }


    /**
     * volunteer button on the event clicked by individual
     * but not virefied from the institue that made this event.
     *
     * @return \Illuminate\Http\Response
     */

    public function volunteer($eventId)
    {
        list($user ,$date)=$this->slidbare();
        if($user->userType == 0 || $user->userType == 3){
            $preVol = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->first();
            if($preVol){
                return redirect()->route('errorPage')->withErrors('You already sent a volunteer request.');
            }
            $volunteer = new volunteer();
            $volunteer->event_id = $eventId;
            $volunteer->user_id = $user->id;
            $volunteer->save();
            return redirect()->route('event',compact('eventId'));
        }else
            return redirect()->route('errorPage')->withErrors("You can't volunteer.");
    }

    /**
     * disVolunteer button on the event clicked by individual
     * to cancel his volunteer request.
     *
     * @return \Illuminate\Http\Response
     */
    public function disVolunteer($eventId)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->userType == 0 || $user->userType == 3){
                $eventVols = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->delete();
                return redirect()->route('upComingEvents');
            }else{
                return redirect()->route('home');
            }
        }
    }
    /**
     * accept Volunteer -- verify from the institue that made this event.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptVolunteer(Request $request,$eventId)
    {
        if($request->has('accepted'))
        {
            $i = 0;
            $user = Auth::user();
            if(!is_array($request->accepted))
            {
                $request->accepted = array($request->accepted);
            }
            $event = Event::find($eventId);
            if($user->userType == 1 || $user->userType == 3)
            {
                if($event->user_id == $user->id)
                {
                    for($i ;$i < sizeof($request->accepted) ;$i++)
                    {   
                        $volunteerId = $request->accepted[$i];
                        $volunteeruser = user::where('id',$volunteerId)->first();
                        $volunteer = volunteer::where('user_id',$volunteerId)->where('event_id',$eventId)->first();
                        $invite = invite::where('event_id',$eventId)->where('user_id',$volunteerId)->first();
                        if($volunteeruser)
                        {   
                            if($volunteer)
                            {
                                $volunteer->accepted = 1;
                                if($invite)$invite->delete();
                                $volunteer->save();
                                continue;
                            }else
                                return redirect()->route('errorPage')->withErrors("request not found.");
                        }else
                            return redirect()->route('errorPage')->withErrors("profile not found.");
                    }
                }else
                    return redirect()->route('errorPage')->withErrors("this event not yours.");
            }else
                return redirect()->route('errorPage')->withErrors("You can't.");
        }
        return redirect()->back();
    }

    /**
     * unAccept Volunteer which accepted before.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unAcceptVolunteer(Request $request,$eventId)
    {
        if($request->has('unaccepted'))
        {
            $i = 0;
            $user = Auth::user();
            if(!is_array($request->unaccepted))
            {
                $request->unaccepted = array($request->unaccepted);
            }
            $event = Event::find($eventId);
            if($user->userType == 1 || $user->userType == 3)
            {
                if($event->user_id == $user->id)
                {
                    for($i ;$i < sizeof($request->unaccepted) ;$i++)
                    {   
                        $volunteerId = $request->unaccepted[$i];
                        $volunteeruser = user::where('id',$volunteerId)->first();
                        $volunteer = volunteer::where('user_id',$volunteerId)->where('event_id',$eventId)->first();
                        if($volunteeruser)
                        {
                            $volunteer = volunteer::where('user_id',$volunteerId)->where('event_id',$eventId)->first();
                            $volunteer->accepted = 0;
                            $volunteer->save();
                        }else
                            return redirect()->route('errorPage')->withErrors("profile not found.");
                    }
                }else
                    return redirect()->route('errorPage')->withErrors("this event not yours.");
            }else
                return redirect()->route('errorPage')->withErrors("You can't.");
        }
        return redirect()->back();
    }

    public function closeEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = $this->user;
        if($event->user_id == $user->id)
        {
            $event->open = 0;
            $event->save();
            return redirect()->back();
        }
        return redirect()->route('errorPage')->withErrors('not yours.');
    }

    public function openEvent($eventId)
    {
        $event = Event::findOrFail($eventId);
        $user = $this->user;
        if($event->user_id == $user->id)
        {
            $event->open = 1;
            $event->save();
            return redirect()->back();
        }
        return redirect()->route('errorPage')->withErrors('not yours.');
    }
}
