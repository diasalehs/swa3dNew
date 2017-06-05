<?php 

namespace App\Http\Controllers;
class headerController extends Controller
{
	public function getLogin()
	{
		return view('main.blade');
	}
	public function postLogin(Request $request)
	{
		
	}
}
