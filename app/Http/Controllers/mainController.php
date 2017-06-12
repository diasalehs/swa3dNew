<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\news;
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

		$news_record=news::orderBy('created_at','desc')->take(3)->get();
         return view('main',["news_record"=>$news_record],["_3slides"=>$_3slides]);

		// }
	}
}