<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\friend;
use App\event;
use Illuminate\Http\Request;
use App\volunteer;
use App\message;
use App\researches;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Response;
use App\Initiative;

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
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $users_record= User::paginate();
            $date = $this->date;
            if ($user->userType=== 10 ) {
                return view('admin/adminDashboard',["users_record"=>$users_record]);
            }
            if($user->flag == 1){
                if($user->userType == 0){
                    $myInitiatives = initiative::where('adminId',$user->id);
                    $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
                    $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
                    $researches=researches::where('ind_id',auth::user()->individuals->id)->get();
                    return view('Individual/homeIndividual',compact('user','researches','myUpComingEvents','myArchiveEvents','userIndividual','followers','following','myInitiatives'));
                }
                elseif($user->userType == 1){
                    $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
                    $Uevents = event::where('user_id', $user->id)->where('startDate','<',$date)->get();
                    return view('Institute/homeInstitute',compact('user','userInstitute','Aevents','Uevents','following','followers'));
                }

                elseif($user->userType == 10){
                    return view('admin.adminDashboard',compact("users_record"));
                }
            }

            elseif($user->flag == 0){
            return redirect()->route('step');
            }
        }
        else
        {
                return redirect()->route('main');
        }
    }

    public function profileViewEdit()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        if($user->userType == 0){
            $userIndividual = Auth::user()->Individuals;
            $date = $this->date;
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        }elseif ($user->userType == 1) {
            $userInstitute = Auth::user()->Institute;
            $Aevents = event::where('user_id', $user->id)->where('startDate','<',$date);
            $Uevents = event::where('user_id', $user->id)->where('startDate','>',$date);
            return view('institute/profileViewEdit',compact('userInstitute',
            'user','Aevents','Uevents','followers','following'));
        }
        return view('follow/profileViewEdit',compact('user','myUpComingEvents','myArchiveEvents','userIndividual','followers','following'));
    }
     public function researcher()
    {
        $user = Auth::user();
        $date = $this->date;
        $followers = friend::where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
        $date = $this->date;
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        $users_record= DB::table('users')->get();
        auth::user()->Individuals->researcher=1;
        auth::user()->Individuals->save();
        return redirect()->route('home',compact('user','myUpComingEvents','myArchiveEvents','followers','following'));
    }
    public function addResearch()
    {
      $user = Auth::user();
      $date = $this->date;
      $followers = friend::where('requested_id', $user->id)->get();
      $following = friend::where('requester_id', $user->id)->get();
       $researches=researches::where('ind_id',auth::user()->individuals->id)->get();

      $date = $this->date;
      $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
      $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
      $users_record= DB::table('users')->get();
      auth::user()->Individuals->researcher=1;
      auth::user()->Individuals->save();
        $success=0;

        return  view('individual/researches',compact('researches','success','user','myUpComingEvents','myArchiveEvents','followers','following'));
    }
    public function submitResearch(Request $request)
    {
        $research=new researches();
        $research->title=$request['title'];
        $research->ind_id=auth::user()->individuals->id;
        $research->researcher_name=auth::user()->individuals->nameInEnglish;
        $research->abstract=$request['abstract'];
        $research->recommendations=$request['recommendations'];
        $research->creation_date=$request['creation_date'];
        $research->findings=$request['findings'];
        $research->tool1=$request->input('tool1');
        $research->tool2=$request->input('tool2');
        $research->credit=$request->input('credit');
        $user = Auth::user();
        $date = $this->date;
        $followers = friend::where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
        $date = $this->date;
        $researches=researches::where('ind_id',auth::user()->individuals->id)->get();

        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        $users_record= DB::table('users')->get();
        $file = $request->file('filefield');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $research->mime = $file->getClientMimeType();
        $research->original_filename = $file->getClientOriginalName();
        $research->filename = $file->getFilename().'.'.$extension;

        $research->save();
        $success=1;
        return  view('individual/researches',compact('researches','success','user','myUpComingEvents','myArchiveEvents','followers','following'));
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
            }
                elseif ($user->userType == 1) {
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

    public function message(){
        $user = Auth::user();
        $sentMessages = message::join('users', 'messages.receiver_id' ,'=','users.id')->where('sender_id',$user->id)->get();
        $receivedMessages = message::join('users', 'messages.sender_id' ,'=','users.id')->where('receiver_id',$user->id)->get();
        return view('messenger',compact('sentMessages','receivedMessages'));
    }

    public function sendMessage(Request $request){
        $user = Auth::user();
        $message = new message();
        $message->title = $request['title'];
        $message->body = $request['body'];
        $receiver = User::where('email',$request['email'])->first();
        if($receiver){
            $message->receiver_id = $receiver->id;
            $message->sender_id = $user->id;
            $message->save();
        }

        $sentMessages = message::join('users', 'messages.receiver_id' ,'=','users.id')->where('sender_id',$user->id)->get();
        $receivedMessages = message::join('users', 'messages.sender_id' ,'=','users.id')->where('receiver_id',$user->id)->get();
        return view('messenger',compact('sentMessages','receivedMessages'));
    }


    public function myResearches(){
            $user = Auth::user();
            $date = $this->date;
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $researches=researches::where('ind_id',auth::user()->individuals->id)->get();
            $date = $this->date;
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
            $users_record= DB::table('users')->get();
            return view('individual/myResearches',compact('researches','user','myUpComingEvents','myArchiveEvents','users_record','following','followers'));
       
    }


}
