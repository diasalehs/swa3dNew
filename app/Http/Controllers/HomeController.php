<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;

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
        if(Auth::user()->flag == 1){
            return view('home');
        }elseif(Auth::user()->flag == 0){
            return redirect()->route('step');
        }
    }
}
