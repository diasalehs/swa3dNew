<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;

class headerController extends Controller
{
	public function getLogin()
	{
		if(Auth::check()){
			if(Auth::user()->flag == 1){
				return view('main.blade');
	        }elseif(Auth::user()->flag == 0){
	            return redirect()->route('step');
	        }
	    }else{
				return redirect()->route('main');
		}
	}
	public function postLogin(Request $request)
	{
		
	}
}
