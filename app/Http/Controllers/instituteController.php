<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;

class instituteController extends Controller
{
	public function __construct()
    {
    	$this->middleware(['auth','institute']);
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
            $this->date = $date;
            $this->user = $user;
            return $next($request);
        });
    }

     public function findVolunteers()
    {
            $user = $this->user;
            $following = friend::where('requester_id', $user->id)->get();
            $users_record= user::where('userType',0)->get();
            return view('institute/findVolunteers',compact('users_record','following','followers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followers()
    {
        $user = $this->user;
        $followers = friend::join('users','friends.requester_id','=','users.id')->where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
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
        $user = $this->user;
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        return view('institute/following',compact('user','followers','following','Aevents','Uevents'));
    }
}
