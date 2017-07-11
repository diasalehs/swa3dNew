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


}
