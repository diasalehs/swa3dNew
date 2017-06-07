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
    public function step()
    {
        if(Auth::user()->flag == 1){
            return view('home');
        }elseif(Auth::user()->flag == 0){
            return redirect()->route('step');
        }
    }   

    public function admin()
    {
        $user = Auth::user();
        $users_record= DB::table('users')->get();
        if ($user->userType=== 10 ) {
            return view('admin/adminDashboard',["users_record"=>$users_record]);
        }
        return view('home');
    }
}
