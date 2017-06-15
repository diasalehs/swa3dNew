<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\friend;
use App\event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->date = date('Y-m-d');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::attempt() || Auth::user()){
            $user = Auth::user();
            $userIndividual = Auth::user()->Individuals;
            $userInstitute = Auth::user()->Institute;
            $userResearcher = Auth::user()->Researcher;
            $followers = friend::where('requester_id', $user->id);
            $following = friend::where('requested_id', $user->id);
            $users_record= DB::table('users')->get();
            $date = $this->date;
            if ($user->userType=== 10 ) {
                return view('admin/adminDashboard',["users_record"=>$users_record]);
            }
            if($user->flag == 1){
                if($user->userType == 0){
                    return view('Individual/homeIndividual',compact('user','userIndividual','followers','following'));
                }
                if($user->userType == 1){
                    $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
                    $Uevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
                    return view('Institute/homeInstitute',compact('user','userInstitute','Aevents','Uevents','followers','following'));
                }
                if($user->userType == 2){
                    return view('Researcher/homeResearcher',compact('user','userResearcher','followers','following'));
                }
            }elseif($user->flag == 0){
                return redirect()->route('step');
            }
        }else{
                return redirect()->route('main');
        }
    }

    public function allusers()
    {
            $user = Auth::user();
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $users_record= DB::table('users')->get();
            return view('follow/allusers',compact('user','users_record','following','followers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followers()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
        return view('follow/followers',compact('user','followers','following'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function following()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id)->get();
        return view('follow/following',compact('user','followers','following'));
    }

    public function profileViewEdit()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        if($user->userType == 0){
            $userIndividual = Auth::user()->Individuals;
        }elseif ($user->userType == 1) {
            $userInstitute = Auth::user()->Institute;
            $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
            $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
            return view('institute/profileViewEdit',compact('userInstitute',
            'user','Aevents','Uevents','followers','following'));
        }elseif ($user->userType == 2) {
            $userIndividual = Auth::user()->Researcher;
        }
        return view('follow/profileViewEdit',compact('user','userIndividual','followers','following'));
    }

    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);
            if($user->userType == 0){
                $user->name = $request['name'];
                if($user->email != $request['email']){
                    $this->validate($request, [
                        'email' => 'required|string|email|max:255|unique:users',
                    ]);
                    $user->email = $request['email'];
                }
                if(isset($request->password)){
                    $this->validate($request, [
                        'password' => 'required|string|min:6|confirmed',
                    ]);
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                $Individuals = Auth::user()->Individuals;
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
            }if ($user->userType == 2) {

                $user->name = $request['name'];
                if($user->email != $request['email']){
                    $this->validate($request, [
                        'email' => 'required|string|email|max:255|unique:users',
                    ]);
                    $user->email = $request['email'];
                }
                if(isset($request->password)){
                    $this->validate($request, [
                        'password' => 'required|string|min:6|confirmed',
                    ]);
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                $Researcher = Auth::user()->Researcher;
                $Researcher->nameInEnglish = $user->name;
                $Researcher->user_id = $user->id;
                $Researcher->nameInArabic = $user->name;
                $Researcher->email = $user->email;
                $Researcher->livingPlace = $request['livingPlace'];
                $Researcher->gender = $request['gender'];
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
            }elseif ($user->userType == 1) {
                $user->name = $request['name'];
                if($user->email != $request['email']){
                    $this->validate($request, [
                        'email' => 'required|string|email|max:255|unique:users',
                    ]);
                    $user->email = $request['email'];
                }
                if(isset($request->password)){
                    $this->validate($request, [
                        'password' => 'required|string|min:6|confirmed',
                    ]);
                    $user->password = bcrypt($request->password);
                }
                $user->save();
                $Institute = Auth::user()->Institute;
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
            }
        return redirect()->route('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function follow( $userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->first();
        if(!$friend){
            $friend = new friend();
            $friend->requester_id = Auth::user()->id;
            $friend->requested_id = $userId;
            $friend->save();
        }
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->delete();
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->back();
    }

    public function resetPassword()
    {
        $user = Auth::user();
        $userId = $user->id;
        return view('auth/passwords/reset',compact('userId'));
    }

}
