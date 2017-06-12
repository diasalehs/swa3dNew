<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\news;
use App\Individuals;
use App\slider;
class mainController extends Controller
{
	public function main() {
		// if(Auth::attempt() || Auth::user()){
		// 	if(Auth::user()->flag == 0){
		// 		return redirect()->route('step');
		// 	}elseif(Auth::user()->flag == 1){
		// 		return view('main');
		// 	}
		// }else{

		$_3slides=slider::orderBy('created_at','desc')->take(3)->get();
		$volunteers=Individuals::orderBy('created_at','desc')->take(5)->get();
		$news_record=news::orderBy('created_at','desc')->take(3)->get();
         return view('main',compact('volunteers','_3slides','news_record'));

		// }
	}
}
