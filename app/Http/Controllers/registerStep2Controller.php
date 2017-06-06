<?php 
namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Individuals;
class registerStep2Controller extends Controller
{
	// check the user type !!
	public function IndividualRegister(Request $request){
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

		return redirect()->route('home');
	}

	public function InstituteRegister(Request $request){
		$this->validate($request, [
				'name' => 'required|alpha'
			]);
		$Institute = new Institute();
        $Institute->license = $request['license'];
        $Institute->cityName = $request['cityName'];
        $Institute->country = $request['country'];
        $Institute->livingPlace = $request['livingPlace'];
        $Institute->email = $request['email'];
        $Institute->workSummary = $request['workSummary'];
        $Institute->activities = $request['activities'];
        $Institute->mobileNumber = $request['mobileNumber'];
        $Institute->address = $request['address'];
        $Institute->mobileNumber = $request['mobileNumber'];
        $Institute->mobileNumber = $request['mobileNumber'];

        $Institute->save();

		return redirect()->route('home');
	}

	public function ResearcherRegister(Request $request){
		$this->validate($request, [
				'name' => 'required|alpha'
			]);
		$Researcher = new Researcher();
        $Researcher->nameInEnglish = $request['nameInEnglish'];
        $Researcher->cityName = $request['cityName'];
        $Researcher->country = $request['country'];
        $Researcher->dateOfBirth = $request['dateOfBirth'];
        $Researcher->email = $request['email'];
        $Researcher->save();

		return redirect()->route('home');
	}
}