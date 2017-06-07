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
                $Individuals->livingPlace = $request['livingPlace'];
                $Individuals->gender = $request['gender'];
                $Individuals->cityName = $request['cityName'];
                $Individuals->country = $request['country'];
                $Individuals->currentWork = $request['currentWork'];
                $Individuals->educationalLevel = $request['educationalLevel'];
                $Individuals->preVoluntary = $request['preVoluntary'];
                $Individuals->voluntaryYears = $request['voluntaryYears'];
                $Individuals->dateOfBirth =  $request['dateOfBirth'];
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
                $Researcher->gender = $request['gender'];
                $Researcher->livingPlace = $request['livingPlace'];
                $Researcher->cityName = $request['cityName'];
                $Researcher->country = $request['country'];
                $Researcher->currentWork = $request['currentWork'];
                $Researcher->educationalLevel = $request['educationalLevel'];
                $Researcher->preVoluntary = $request['preVoluntary'];
                $Researcher->voluntaryYears = $request['voluntaryYears'];
                $Researcher->dateOfBirth =  $request['dateOfBirth'];
                $Researcher->save();

        	return redirect()->route('home');
	}
}