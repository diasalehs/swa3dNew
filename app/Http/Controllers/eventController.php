<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\User;
use App\volunteer;
use App\event;
use App\EventIntrest;
use App\EventTarget;
use App\friend;


class eventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->date = date('Y-m-d');
    }

    public function makeEvent(){
        $user = Auth::user();
        if($user->userType == 1 || $user->userType == 3)
        {
            $date = $this->date;
            $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
            $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
            return view('shared/makeEvent',compact('user','Aevents','Uevents'));
        }
        abort(403, 'Unauthorized action.');
    }

    public function makeEventPost(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'country' => 'required|string',
            'startDate' => 'required|date|after:today',
            'endDate' => 'required|date|after:start_date',
        ]);

        $event = new event();
        $event->title = $request['title'];
        $event->user_id = $user->id;
        $event->description = $request['description'];
        $event->country = $request['country'];
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
        $eveint= new  eventIntrest();
        $eveint->event_id=$event->id;
        $eveint->intrest_id=$request['intrests'];
        $eveint->save();

        $evetarget= new EventTarget();
        $evetarget->event_id=$event->id;
        $evetarget->target_id=$request['target'];
        $evetarget->save();

        return redirect()->route('event',compact('event'));
    }

    public function myEvents(){
        $user = Auth::user();
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date)->get();
        return view('institute/myEvents',compact('user','Aevents','Uevents'));
    }

    public function archiveMyEvents() {
        $user = Auth::user();
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        return view('institute/archiveMyEvents',compact('user','Aevents','Uevents'));
    }

    /**
     * volunteer button on the event clicked by individual
     * but not virefied from the institue that made this event.
     *
     * @return \Illuminate\Http\Response
     */

    public function volunteer($eventId)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->userType == 0){
                $flag = 0;
                $individual = $user->individuals;
                $eventVols = volunteer::where('event_id',$eventId)->get();
                foreach ($eventVols as $eventVol) {
                    if($eventVol->individual_id == $individual->id){
                        $flag = 1;
                        return redirect()->route('upComingEvents');
                    }
                }
                if($flag == 0){
                    $volunteer = new volunteer();
                    $volunteer->event_id = $eventId;
                    $volunteer->individual_id = $individual->id;
                    $volunteer->save();
                    return redirect()->route('event',compact('eventId'));
                }
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login');
        }
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
            if($user->userType == 0){
                $individual = $user->individuals;
                $eventVols = volunteer::where('event_id',$eventId)->where('individual_id',$individual->id)->delete();
                return redirect()->route('upComingEvents');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login');
        }
    }
    /**
     * accept Volunteer -- verify from the institue that made this event.
     *
     * @return \Illuminate\Http\Response
     */
    public function acceptVolunteer($volunteerId,$eventId)
    {
        $user = Auth::user();
        $event = event::find($eventId);
        if($event->user_id == $user->id){
            $volunteer = volunteer::where('individual_id',$volunteerId)->where('event_id',$eventId)->first();
            $volunteer->accepted = 1;
            $volunteer->save();
        }
        return redirect()->back();
    }

    /**
     * unAccept Volunteer which accepted before.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unAcceptVolunteer($volunteerId,$eventId)
    {
        $user = Auth::user();
        $event = event::find($eventId);
        if($event->user_id == $user->id){
            $volunteer = volunteer::where('individual_id',$volunteerId)->where('event_id',$eventId)->first();
            $volunteer->accepted = 0;
            $volunteer->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
