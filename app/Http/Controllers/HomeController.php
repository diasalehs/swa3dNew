<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\friend;
use App\event;
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
            $users_record= DB::table('users')->get();
            if ($user->userType=== 10 ) {
                return view('admin/adminDashboard',["users_record"=>$users_record]);
            }
            if($user->flag == 1){
                if($user->userType == 0){
                    $followers = friend::where('requester_id', $user->id);
                    $following = friend::where('requested_id', $user->id);
                    return view('Individual/homeIndividual',compact('user','userIndividual','followers','following'));}
                if($user->userType == 1){
                    $events = event::where('user_id', $user->id)->get();
                    return view('Institute/homeInstitute',compact('user','userInstitute','events'));}
                if($user->userType == 2){return view('Researcher/homeResearcher',compact('user','userResearcher'));}
            }elseif($user->flag == 0){
                return redirect()->route('step');
            }
        }else{
                return redirect()->route('main');
        }
    }

}
