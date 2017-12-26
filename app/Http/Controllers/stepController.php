<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Intrest;
use App\targetedGroups;

class stepController extends Controller
{
	public function step() {
		Auth::user()->verified=1;
		Auth::user()->save();
		if(Auth::check())
		{
			if(Auth::user()->flag == 0){
			$intrests = Intrest::get();
			$targets = targetedGroups::get();
			return view('step',compact('intrests','targets'));
			}elseif(Auth::user()->flag == 1){
				return redirect()->route('home');
			}
		}else{
				return redirect()->route('main');
		}
	}
}