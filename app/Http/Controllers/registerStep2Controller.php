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

	public function allRegister(Request $request){
        	$user = Auth::user();
                if($user->flag == 0){
                        if($user->userType == 0){
                        	$Individuals = new Individuals();
                                $Individuals->nameInEnglish = $user->name;
                                $Individuals->user_id = $user->id;
                                $Individuals->nameInArabic = $user->name;
                                $Individuals->email = $user->email;
                                $Individuals->livingPlace = $request['livingPlace'];
                                $Individuals->gender = $request['gender'];
                                $Individuals->cityName = $request['cityName'];
                                $Individuals->country = $request['country'];
                                $Individuals->currentWork = $request['currentWork'];
                                $Individuals->educationalLevel = $request['educationalLevel'];
                                $Individuals->preVoluntary = $request['preVoluntary'];
                                if($request['preVoluntary'] == 1){
                                        $Individuals->voluntaryYears = $request['voluntaryYears'];
                                }else{$Individuals->voluntaryYears = 0;}
                                $Individuals->dateOfBirth =  $request['dateOfBirth'];
                                $Individuals->save();
                                $user->flag = 1;
                                $user->save();
                        }
                        elseif($user->userType == 1){
                                $Institute = new Institute();
                                $Institute->nameInEnglish = $user->name;
                                $Institute->user_id = $user->id;
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
                                $user->flag = 1;
                                $user->save();
                        }
                        elseif($user->userType == 2){
                                $Researcher = new Researcher();
                                $Researcher->nameInEnglish = $user->name;

                                $Researcher->user_id = $user->id;

                                $Researcher->nameInArabic = $user->name;
                                $Researcher->email = $user->email;
                                $Researcher->gender = $request['gender'];
                                $Researcher->livingPlace = $request['livingPlace'];
                                $Researcher->cityName = $request['cityName'];
                                $Researcher->country = $request['country'];
                                $Researcher->currentWork = $request['currentWork'];
                                $Researcher->educationalLevel = $request['educationalLevel'];
                                $Researcher->preVoluntary = $request['preVoluntary'];
                                if($request['preVoluntary'] == 1){
                                        $Researcher->voluntaryYears = $request['voluntaryYears'];
                                }else{$Researcher->voluntaryYears = 0;}
                                $Researcher->dateOfBirth =  $request['dateOfBirth'];
                                $Researcher->save();
                                $user->flag = 1;
                                $user->save();
                        }
                        return redirect()->route('home');

                }
                else{return redirect()->route('home');}
	}

}
