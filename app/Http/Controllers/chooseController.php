<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


class chooseController extends Controller
{
	public function choose() {
		if(Auth::attempt() || Auth::user()){
			if(Auth::user()->flag == 0){
				return redirect()->route('step');
			}else{
				return redirect()->route('home');
			}
		}else{
				return view('choose');
		}
	}
}