<?php 
namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\Individuals;

class registerStep2Controller extends Controller
{
	// check the user type !!
	public function index(Request $request){

		if($request['userType']===0 ){
		return view('IndividualRegister');

		}
		if($request['userType']===2 ){
		return view('ResercherRegister');

		}if($request['userType']===1 ){
		return view('InstituteRegister');

		}
		
	}
}