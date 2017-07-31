<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Friend;
use App\Event;
use Illuminate\Http\Request;
use App\Volunteer;
use App\tags;
use App\news;
use App\researches_tags;
use App\message;
use App\researches;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Response;
use App\Initiative;
use App\Individuals;
use App\tempInstitute;
use App\Qualification;
use App\Intrest;
use App\targetedGroups;
use App\UserIntrest;
use App\UserTarget;
use Image;

class homeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::User();
            $this->date = $date;
            $this->user = $user;
            return $next($request);
        });
    }

    public function slidbare()
    {
        $date = $this->date;
        $user = $this->user;
        return [$user ,$date];
    }

    public function allusers()
    {
        list($user ,$date)=$this->slidbare();
        $users_record= user::get();
        $following = friend::where('requester_id', $user->id)->get();
        return view('shared/allusers',compact('users_record','following'));
    }

    public function findVolunteers()
    {
        list($user ,$date)=$this->slidbare();
        $userUevents = Event::where('events.user_id',$user->id)->where('startDate','>',$date)->get();
        $following = friend::where('requester_id', $user->id)->get();
        $users_record= Individuals::get();
        return view('shared/findVolunteers',compact('users_record','following','userUevents'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            list($user ,$date)=$this->slidbare();
            $user = Auth::User();
            if ($user->userType== 10 )
            {
                $news_count= news::where('approved','0')->count();

                $users_record= tempInstitute::paginate();
                return view('admin/adminDashboard',compact("users_record",'news_count'));
            }
            elseif($user->flag == 1)
            {
                if($user->userType == 0){
                    $user = $user->Individuals;
                    return view('individual/homeIndividual',compact('user'));
                }
                elseif($user->userType == 1)
                {
                    if($user->adminApproval==1)
                    {
                        $user = $user->Institute;
                        return view('institute/homeInstitute',compact('user'));
                    }
                    else
                         return redirect()->route('errorPage')->withErrors('Wait Till Verification.');
                }
                elseif($user->userType == 3){
                    $user = $user->Initiative;
                    return view('initiative/homeInitiative',compact('user'));
                }
                else
                    return abort(403,'Unauthorized action.');
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
        list($user ,$date)=$this->slidbare();
        $intrests = Intrest::get();
        $targets = targetedGroups::get();
        if($user->userType == 0){
            $userIndividual = $user->Individuals;
            $qualifications = Qualification::where('user_id',$user->id)->get();
            return view('individual/profileViewEdit',compact('user','userIndividual','qualifications','intrests','targets'));
        }elseif ($user->userType == 1) {
            $userInstitute = Auth::user()->Institute;
            return view('institute/profileViewEdit',compact('userInstitute','user','intrests','targets'));
        }
        elseif ($user->userType == 3) {
            $initiative = Auth::user()->initiative;
            return view('initiative/editInitiative',compact('user','initiative','intrests','targets'));
        }

        } 

    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'firstName' => 'required|regex:/^[a-zA-Z]+$/',
            'lastName' => 'required|regex:/^[a-zA-Z]+$/',
            'ARfirst' => 'required|alpha',
            'ARlast' => 'required|alpha',
            'country' => 'required',
            'cityName' => 'required_without:x',
            'x' => 'required_without:cityName',
            'intrests' => 'required',
            'targets' => 'required',
        ]);
        if($user->userType == 0)
        {
            if(isset($request->password))
            {
                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed',
                ]);
                $user->password = bcrypt($request->password);
            }

            $Individuals = Auth::user()->Individuals;
            $Individuals->firstInEnglish = $request['firstName'];
            $Individuals->lastInEnglish = $request['lastName'];
            $Individuals->firstInArabic = $request['ARfirst'];
            $Individuals->lastInArabic = $request['ARlast'];
            $Individuals->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
            $Individuals->nameInEnglish = "".$request['firstName']." ".$request['lastName'];
            if ($request->hasFile('picture'))
            {
                $picture = $request->file('picture');
                $imagename = time().'.'.$picture->getClientOriginalExtension();
                Image::make($picture)->save(public_path('pp/'.$imagename));
                $Individuals->picture = $picture;
                $user->picture = $picture;
            }
            $Individuals->mobileNumber = $request->mobileNumber;
            $Individuals->address = $request->address;
            $user->name= $Individuals->nameInEnglish;
            $user->save();

            $Individuals->email = $user->email;
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
        }                               
        elseif ($user->userType == 1)
        {
            $this->validate($request, [
                'livingPlace' => 'required',
                'establishmentYear' => 'required|date|after:01/01/1900',
                'address' => 'required|max:30',
                'mobileNumber' => 'required|digits:11',
            ]);
            if(isset($request->password))
            {
                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed',
                ]);
                $user->password = bcrypt($request->password);
            }

            $Institute = Auth::user()->Institute;
            $Institute->firstInEnglish = $request['firstName'];
            $Institute->lastInEnglish = $request['lastName'];
            $Institute->firstInArabic = $request['ARfirst'];
            $Institute->lastInArabic = $request['ARlast'];
            $Institute->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
            $Institute->nameInEnglish = "".$request['firstName']." ".$request['lastName'];
            $Institute->user_id = $user->id;
            $Institute->cityName = $request['cityName'];
            $Institute->country = $request['country'];
            $Institute->livingPlace = $request['livingPlace'];
            $Institute->address = $request['address'];
            $Institute->mobileNumber = $request['mobileNumber'];
            $Institute->establishmentYear = $request['establishmentYear'];
            $Institute->save();
            $user->name = $Institute->nameInEnglish;
            $user->save();

            UserIntrest::where('user_id',$user->id)->delete();
            foreach ($request['intrests'] as $i) 
            {
                $ui=new UserIntrest;
                $ui->intrest_id = $i;
                $ui->user_id=$user->id;
                $ui->save();
            }

            UserTarget::where('user_id',$user->id)->delete();
            foreach ($request['targets'] as $t) {
                $ui=new UserTarget;
                $ui->target_id = $t;
                $ui->user_id=$user->id;
                $ui->save();
            }


        }
        elseif($user->userType == 3)
        {
            $this->validate($request, [
                'name' => 'required|string|max:255',
            ]);
            $user->name = $request['name'];
            if($user->email != $request['email'])
            {
                $this->validate($request, [
                    'email' => 'required|string|email|max:255|unique:users',
                ]);
                $user->email = $request['email'];
            }
            if(isset($request->password))
            {
                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed',
                ]);
                $user->password = bcrypt($request->password);
            }
            $user->save();
            $initiative = $user->initiative;
            $initiative->nameInEnglish = $user->name;
            $initiative->nameInArabic = $user->name;
            $initiative->email = $user->email;
            $initiative->livingPlace = $request['livingPlace'];
            $initiative->cityName = $request['cityName'];
            $initiative->country = $request['country'];
            $initiative->currentWork = $request['currentWork'];
            $initiative->preVoluntary = $request['preVoluntary'];
            if($request['preVoluntary'] == 1)
            {
                $initiative->voluntaryYears = $request['voluntaryYears'];
            }
            else
            {
                $initiative->voluntaryYears = 0;
            }
            $initiative->dateOfBirth =  $request['dateOfBirth'];
            $initiative->save();
        }
        else return abort(403, 'Unauthorized action.');
        return redirect()->route('home');
    }

    
    public function message(){
        $user = Auth::user();
        $sentMessages = message::join('users', 'messages.receiver_id' ,'=','users.id')->where('sender_id',$user->id)->get();
        $receivedMessages = message::join('users', 'messages.sender_id' ,'=','users.id')->where('receiver_id',$user->id)->get();
        return view('messenger',compact('sentMessages','receivedMessages'));
    }

    public function sendMessage(Request $request){
        $user = $this->user;
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

}
