<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\friend;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::attempt() || Auth::user()){
            $user = Auth::user();
            $userIndividual = Auth::user()->Individuals;
            $userInstitute = Auth::user()->Institute;
            $userResearcher = Auth::user()->Researcher;
            $followers = friend::where('requester_id', $user->id);
            $following = friend::where('requested_id', $user->id);
            $users_record= DB::table('users')->get();
            if ($user->userType=== 10 ) {
                return view('admin/adminDashboard',["users_record"=>$users_record]);
            }
            if($user->flag == 1){
                if($user->userType == 0){return view('Individual/homeIndividual',compact('user','userIndividual','followers','following'));}
                if($user->userType == 1){return view('Institute/homeInstitute',compact('user','userInstitute'));}
                if($user->userType == 2){return view('Researcher/homeResearcher',compact('user','userResearcher'));}
            }elseif($user->flag == 0){
                return redirect()->route('step');
            }
        }else{
                return redirect()->route('main');
        }
    }

    public function allusers()
    {
            $user = Auth::user();
            $followers = friend::where('requester_id', $user->id);
            $following = friend::where('requested_id', $user->id);
            $users_record= DB::table('users')->get();
            return view('individual/allusers',compact('user','users_record','following','followers'));
    }

    public function followers()
    {
        $user = Auth::user();
        $followers = friend::where('requester_id', $user->id);
        $following = friend::where('requested_id', $user->id);
        return view('individual/followers',compact('user','followers','following'));
    }

    public function follow( $userId)
    {
        $user = Auth::user();
        $friend = new friend();
        $friend->requester_id = Auth::user()->id;
        $friend->requested_id = $userId;
        $friend->save();
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->route('allusers');
    }

    public function following()
    {
        $user = Auth::user();
        $followers = friend::where('requester_id', $user->id);
        $following = friend::where('requested_id', $user->id);
        return view('individual/following',compact('user','followers','following'));
    }
}
