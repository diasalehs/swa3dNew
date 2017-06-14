<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
    	$events = event::where('user_id', $user->id);
    	return view('institute/makeEvent',compact('user','events','followers','following'));
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

    	return view('institute/eventView',compact('user','event'));
    }
    public function myEvents(){
    	$user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
    	$events = event::where('user_id', $user->id)->get();
    	return view('institute/myEvents',compact('user','events','followers','following'));
    }

    public function archiveMyEvents() {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $events = event::where('user_id', $user->id)->get();
        return view('institute/archiveMyEvents',compact('user','events','followers','following'));
    }

    public function eventView($eventId){
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $events = event::where('user_id', $user->id)->get();
        $event = event::find($eventId);
        return view('institute/eventView',compact('user','event','events','followers','following'));
    }

    public function eventDelete($eventId){
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $events = event::where('user_id', $user->id)->get();
        $event = event::find($eventId);
        return redirect()->back();
    }
     public function findVolunteers()
    {
            $user = Auth::user();
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $events = event::where('user_id', $user->id);
            $users_record= DB::table('users')->get();
            return view('institute/findVolunteers',compact('user','users_record','following','followers','events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followers()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
        $events = event::where('user_id', $user->id);
        return view('institute/followers',compact('user','followers','following','events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function following()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id)->get();
        $events = event::where('user_id', $user->id);
        return view('institute/following',compact('user','followers','following','events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function follow( $userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->first();
        if(!$friend){
            $friend = new friend();
            $friend->requester_id = Auth::user()->id;
            $friend->requested_id = $userId;
            $friend->save();
        }
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->delete();
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->back();
    }
}
