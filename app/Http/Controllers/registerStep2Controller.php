<?php
namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Individuals;
use App\tempInstitute;
use App\User;
use Illuminate\Support\Facades\auth;


class registerStep2Controller extends Controller
{
	// check the user type !!

	public function allRegister(Request $request){
        	$user = Auth::user();
                if($user->flag == 0){
                        if($user->userType == 0){
                            $this->validate($request, [
                                'livingPlace' => 'required',
                                'gender' => 'required',
                                'cityName' => 'required',
                                'country' => 'required',
                                'currentWork' => 'required',
                                'educationalLevel' => 'required',
                                'preVoluntary' => 'required',
                                'voluntaryYears' => 'integer',
                                'dateOfBirth' => 'required',
                            ]);

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
                              return redirect()->route('home');

                        }
                        elseif($user->userType == 1){
                                $this->validate($request, [
                                    'livingPlace' => 'required',
                                    'license' => 'required',
                                    'cityName' => 'required',
                                    'country' => 'required',
                                    'workSummary' => 'required',
                                    'activities' => 'required',
                                    'mobileNumber' => 'integer',
                                    'address' => 'required',
                                ]);

                                $Institute = new tempInstitute();
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
                             return view('waitTillverification');

                        }
                        

                }
                else{return redirect()->route('home');}
	}

}
