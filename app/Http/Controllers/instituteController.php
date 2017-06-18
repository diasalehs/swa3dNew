<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\event;
use App\EventIntrest;
use Image;
class instituteController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
        $this->date = date('Y-m-d');
    }
    public function makeEvent(){
    	$user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
    	$Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
    	return view('institute/makeEvent',compact('user','Aevents','Uevents','followers','following'));
    }

    public function eventInstitute(Request $request){
    	$user = Auth::user();

    	$this->validate($request, [
		    'title' => 'required|string|max:100',
            'description' => 'required|string',
            'country' => 'required|string',
		    'startDate' => 'required|date|after:tomorrow',
		    'endDate' => 'required|date|after:start_date',
		]);

    	$event = new event();
    	$event->title = $request['title'];
    	$event->user_id = $user->id;
        $event->description = $request['description'];
        $event->country = $request['country'];
    	$event->startDate = $request['startDate'];
    	$event->endDate = $request['endDate'];
        if ($request->hasFile('cover')){
            $mainImg=$request->file('cover');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('events/'.$imagename));
            $event->cover = $imagename;
        }
    	$event->save();
        $eveint= new  EventIntrest();
        $eveint->event_id=$event->id;
        $eveint->intrest_id=$request['cat'];
        $eveint->save();
    	return redirect()->route('event',compact('event'));
    }
    public function myEvents(){
    	$user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
    	$Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date)->get();
    	return view('institute/myEvents',compact('user','Aevents','Uevents','followers','following'));
    }

    public function archiveMyEvents() {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        return view('institute/archiveMyEvents',compact('user','Aevents','Uevents','followers','following'));
    }

    public function eventView($eventId){
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        $event = event::find($eventId);
        return view('institute/eventView',compact('user','event','Aevents','Uevents','followers','following'));
    }

    public function eventDelete($eventId){
        $user = Auth::user();
        $date = date('Y-m-d');
        $event = event::find($eventId);
        if($event){
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    $event->delete();
                }
            }   
        }
        return redirect()->route('myEvents');
    }

    public function eventVeiwEdit($eventId){
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        $event = event::find($eventId);
        if($event){
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    return view('institute/eventEdit',compact('event','user','Aevents','Uevents','followers','following'));
                }
            }   
        }
        return redirect()->route('home');
    }

    public function eventEdit(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'eventId' => 'required',
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'startDate' => 'required|date|after:tomorrow',
            'endDate' => 'required|date|after:start_date',
        ]);

        $eventId = $request['eventId'];
        $event = event::find($eventId);
        if($event){
            if($event->user_id == $user->id){
                if($event->startDate > $date){
                    $event->title = $request['title'];
                    $event->user_id = $user->id;
                    $event->description = $request['description'];
                    $event->startDate = $request['startDate'];
                    $event->endDate = $request['endDate'];
                    $event->save();
                    return redirect()->route('event',compact('event'));
                }
            }   
        }
        return redirect()->back();
    }


     public function findVolunteers()
    {
            $user = Auth::user();
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $date = $this->date;
            $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
            $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
            $users_record= DB::table('users')->where('userType',0)->get();
            return view('institute/findVolunteers',compact('user','users_record','following','followers','Aevents','Uevents'));
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
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        return view('institute/followers',compact('user','followers','following','Aevents','Uevents'));
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
        $date = $this->date;
        $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
        $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
        return view('institute/following',compact('user','followers','following','Aevents','Uevents'));
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
