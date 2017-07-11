<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Event;
use App\EventIntrest;
use App\EventTarget;
use Image;
class instituteController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
        $this->date = date('Y-m-d');
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
        $followers = friend::join('users','friends.requester_id','=','users.id')->where('requested_id', $user->id)->get();
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
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
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
}
