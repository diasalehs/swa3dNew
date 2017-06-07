<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\User;
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
            $users_record= DB::table('users')->get();
            if ($user->userType=== 10 ) {
                return view('admin/adminDashboard',["users_record"=>$users_record]);
            }
            if($user->flag == 1){
                return view('home');
            }elseif($user->flag == 0){
                return redirect()->route('step');
            }
        }else{
                return redirect()->route('main');
        }
    }
}
