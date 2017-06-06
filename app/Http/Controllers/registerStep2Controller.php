<?php 
namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Individuals;
use App\Institute;
use App\Researcher;
use App\User;
use Illuminate\Support\Facades\auth;


class registerStep2Controller extends Controller
{
	// check the user type !!
	
	public function IndividualRegister(Request $request){
		$user = Auth::user();
		$Individuals = new Individuals();
        $Individuals->nameInEnglish = $user->name;
        $Individuals->nameInArabic = $user->name;
        $Individuals->email = $user->email;
        $Individuals->cityName = $request['cityName'];
        $Individuals->country = $request['country'];
        $Individuals->dateOfBirth =  " ";
        $Individuals->save();

		return redirect()->route('home');
	}

	public function InstituteRegister(Request $request){
		$user = Auth::user();

		$Institute = new Institute();
		$Institute->nameInEnglish = $user->name;
        $Institute->nameInArabic = $user->name;
        $Institute->email = $user->email;
        $Institute->license = $request['license'];
        $Institute->cityName = $request['cityName'];
        $Institute->country = $request['country'];
        $Institute->livingPlace = $request['livingPlace'];
        $Institute->workSummary = $request['workSummary'];
        $Institute->activities = $request['activities'];
        $Institute->mobileNumber = $request['mobileNumber'];
        $Institute->address = $request['address'];
        $Institute->save();

		return redirect()->route('home');
	}

	public function ResearcherRegister(Request $request){
		$user = Auth::user();

		$Researcher = new Researcher();
		$Researcher->nameInEnglish = $user->name;
        $Researcher->nameInArabic = $user->name;
        $Researcher->email = $user->email;
        $Researcher->cityName = $request['cityName'];
        $Researcher->country = $request['country'];
        $Researcher->dateOfBirth = " ";
        $Researcher->save();

		return redirect()->route('home');
	}
}