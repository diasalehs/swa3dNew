<?php 
namespace App\Http\Controllers;
use \Illuminate\Http\Request;

class chooseController extends Controller
{
	public function index(Request $request){
		return view('choose');
	}
}