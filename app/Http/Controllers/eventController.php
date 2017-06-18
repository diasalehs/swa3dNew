<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use App\User;
use App\volunteer;



class eventController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
