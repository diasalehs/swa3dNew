<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Intrest;
use App\targetedGroups;

class stepController extends Controller
{
	public function step() {
		if(Auth::attempt() || Auth::user()){
			if(Auth::user()->flag == 0){
			$intrests  =intrest::get();
			$targets= targetedGroups::all();
				return view('step',compact('intrests','targets'));
			}elseif(Auth::user()->flag == 1){
				return redirect()->route('home');
			}
		}else{
				return redirect()->route('main');
		}
	}
}