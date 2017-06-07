<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;


class mainController extends Controller
{
	public function main() {
		if(Auth::attempt() || Auth::user()){
			if(Auth::user()->flag == 0){
				return redirect()->route('step');
			}elseif(Auth::user()->flag == 1){
				return view('main');
			}
		}else{
				return view('main');
		}
	}
}