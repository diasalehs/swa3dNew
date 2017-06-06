<?php 
namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\Individuals;

class registerStep2Controller extends Controller
{
	// check the user type !!
	public function index(Request $request){
		return view('IndividualRegister');
	}
}