<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;


class stepController extends Controller
{
	public function step() {
		if(Auth::attempt() || Auth::user()){
			if(Auth::user()->flag == 0){
				return view('step');
			}elseif(Auth::user()->flag == 1){
				return redirect()->route('home');
			}
		}else{
				return redirect()->route('main');
		}
	}
}