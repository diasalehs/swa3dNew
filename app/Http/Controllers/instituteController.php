<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;
use Validator;
use App\event;


class instituteController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }
    public function makeEvent(){
    	$user = Auth::user();
    	$events = event::where('user_id', $user->id)->get();
    	return view('institute/makeEvent',compact('user','events'));
    }

    public function event(Request $request){
    	$user = Auth::user();

    	$this->validate($request, [
		    'title' => 'required|string|max:100',
		    'description' => 'required|string',
		    'startDate' => 'required|date|after:tomorrow',
		    'endDate' => 'required|date|after:start_date',
		]);

    	$event = new event();
    	$event->title = $request['title'];
    	$event->user_id = $user->id;
    	$event->description = $request['description'];
    	$event->startDate = $request['startDate'];
    	$event->endDate = $request['endDate'];
    	$event->save();

    	return view('institute/event',compact('user','event'));
    }
    public function myEvents(){
    	$user = Auth::user();
    	$events = event::where('user_id', $user->id)->get();
    	return view('institute/myEvents',compact('user','events'));
    }
}
