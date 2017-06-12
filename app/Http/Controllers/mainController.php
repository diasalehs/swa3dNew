<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\news;
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
		$news_record=news::orderBy('created_at','desc')->take(3)->get();
         return view('main',["news_record"=>$news_record]);

		// }
	}
}