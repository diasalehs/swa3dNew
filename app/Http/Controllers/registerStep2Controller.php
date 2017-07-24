<?php
namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Individuals;
use App\tempInstitute;
use App\User;
use Illuminate\Support\Facades\auth;
use App\UserIntrest;

class registerStep2Controller extends Controller 
{
	// check the user type !!

	public function allRegister(Request $request){
        	$user = Auth::user();

            $this->validate($request, [
                'firstName' => 'required|regex:/^[a-zA-Z ]+$/',
                'lastName' => 'required|regex:/^[a-zA-Z ]+$/',
                'ARfirst' => 'required',
                'ARlast' => 'required',
                'country' => 'required',
                'cityName' => 'required_without:x',
                'x' => 'required_without:cityName',
                'intrests' => 'required',
            ]);
            if($request->has('x'))
            {
                $request->cityName = $request->x;
            }

                if($user->flag == 0 && $user->verified==1)
                {
                        if($user->userType == 0)
                        {
                            $this->validate($request, [
                                'livingPlace' => 'required',
                                'gender' => 'required',
                                'currentWork' => 'required',
                                'educationalLevel' => 'required',
                                'preVoluntary' => 'required',
                                'voluntaryYears' => 'integer',
                                'dateOfBirth' => 'required',
                            ]);

                        	$Individuals = new Individuals();
                            $Individuals->firstInEnglish = $request['firstName'];
                            $Individuals->lastInEnglish = $request['lastName'];
                            $Individuals->firstInArabic = $request['ARfirst'];
                            $Individuals->lastInArabic = $request['ARlast'];
                            $Individuals->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
                            $Individuals->nameInEnglish = "".$request['firstName']." ".$request['lastName'];
                            $Individuals->user_id = $user->id;
                            $Individuals->email = $user->email;
                            $Individuals->gender = $request['gender'];
                            $Individuals->cityName = $request['cityName'];
                            $Individuals->country = $request['country'];
                            $Individuals->currentWork = $request['currentWork'];
                            $Individuals->educationalLevel = $request['educationalLevel'];
                            $Individuals->major= $request['Major'];
                            $Individuals->preVoluntary = $request['preVoluntary'];
                            if($request['preVoluntary'] == 1){
                                    $Individuals->voluntaryYears = $request['voluntaryYears'];
                            }else{$Individuals->voluntaryYears = 0;}
                            $Individuals->dateOfBirth =  $request['dateOfBirth'];
                            $Individuals->save();
                            $user->name = $Individuals->nameInEnglish;
                            $user->flag = 1;
                            $user->save();
                            foreach ($request['intrests'] as $i)
                            {
                                $ui=new UserIntrest;
                                $ui->intrest_id = $i;
                                $ui->user_id=$user->id;
                                $ui->save();
                                # code...
                            }
                            return redirect()->route('home');


                        }
                        elseif($user->userType == 1){
                            $this->validate($request, [
                                'livingPlace' => 'required',
                                'license' => 'max:10|unique:institutes',
                                'activities' => 'required',
                                'establishmentYear' => 'required|date|after:01/01/1900',
                                'address' => 'required|max:30',
                            ]);

                            $Institute = new tempInstitute();
                            $Institute->firstInEnglish = $request['firstName'];
                            $Institute->lastInEnglish = $request['lastName'];
                            $Institute->firstInArabic = $request['ARfirst'];
                            $Institute->lastInArabic = $request['ARlast'];
                            $Institute->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
                            $Institute->nameInEnglish = "".$request['firstName']." ".$request['lastName'];
                            $Institute->user_id = $user->id;
                            $Institute->email = $user->email;
                            $Institute->license = $request['license'];
                            $Institute->cityName = $request['cityName'];
                            $Institute->country = $request['country'];
                            $Institute->livingPlace = $request['livingPlace'];
                            $Institute->address = $request['address'];
                            $Institute->save();
                            $user->name = $Institute->nameInEnglish;
                            $user->flag = 1;
                            $user->save();
                            foreach ($request['intrests'] as $i) 
                            {
                                $ui=new UserIntrest;
                                $ui->intrest_id = $i;
                                $ui->user_id=$user->id;
                                $ui->save();
                            }
                            // foreach ($request['targets'] as $t) {
                            //     $evetarget= new UserTarget();
                            //     $evetarget->event_id=$event->id;
                            //     $evetarget->target_id=$t;
                            //     $evetarget->save();     
                            // }
                            return redirect()->route('home');
                        }
                    }
                        
                elseif($user->verified==0){
                    return redirect()->route('errorPage')->withErrors("User Not Verified.");
                }
                else
                    return redirect()->route('home');
	}

}
