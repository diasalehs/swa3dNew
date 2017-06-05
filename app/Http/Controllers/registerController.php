<?php 
namespace App\Http\Controllers;
use \Illuminate\Http\Request;
use App\Individuals;

class registerController extends Controller
{
	public function postRegister(Request $request){
		$this->validate($request, [
				'name' => 'required|alpha'
			]);
		$Individuals = new Individuals();
        $Individuals->nameInEnglish = $request['nameInEnglish'];
        $Individuals->cityName = $request['cityName'];
        $Individuals->country = $request['country'];
        $Individuals->dateOfBirth = $request['dateOfBirth'];
        $Individuals->email = $request['email'];
        $Individuals->save();

		return redirect()->route('main');
	}
}