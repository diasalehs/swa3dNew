<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;
use App\Initiative;
use App\volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndividualsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
        $this->date = date('Y-m-d');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = $this->date;
        $user = Auth::user();
        $myInitiatives = initiative::where('adminId',$user->id);
        $followers = friend::where('requester_id', $user->id);
        $following = friend::where('requested_id', $user->id);
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        
        return view('individual/makeInitiative',compact('user','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'livingPlace' => 'required',
            'cityName' => 'required',
            'country' => 'required',
            'currentWork' => 'required',
            'preVoluntary' => 'required',
            'voluntaryYears' => 'integer',
            'dateOfBirth' => 'required',
        ]);

        $adminId = Auth::user()->id;

        $user = new User();
        $user->name = $request->name;
        $user->userType = 3;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->flag = 1;
        $user->save();

        $Initiative = new Initiative();
        $Initiative->adminId = $adminId;
        $Initiative->nameInEnglish = $user->name;
        $Initiative->user_id = $user->id;
        $Initiative->nameInArabic = $user->name;
        $Initiative->email = $user->email;
        $Initiative->livingPlace = $request['livingPlace'];
        $Initiative->cityName = $request['cityName'];
        $Initiative->country = $request['country'];
        $Initiative->currentWork = $request['currentWork'];
        $Initiative->preVoluntary = $request['preVoluntary'];
        if($request['preVoluntary'] == 1){
                $Initiative->voluntaryYears = $request['voluntaryYears'];
        }else{$Initiative->voluntaryYears = 0;}
        $Initiative->dateOfBirth =  $request['dateOfBirth'];
        $Initiative->save();
    }

    public function allusers()
    {
            $user = Auth::user();
            $date = $this->date;
            $myInitiatives = initiative::where('adminId',$user->id);
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
            $date = $this->date;
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
            $users_record= DB::table('users')->get();
            return view('individual/allusers',compact('user','myUpComingEvents','myArchiveEvents','users_record','following','followers','myInitiatives'));
    }

    public function followers()
    {
        $user = Auth::user();
        $myInitiatives = initiative::where('adminId',$user->id);
        $followers = friend::join('users','friends.requester_id','=','users.id')->where('requested_id', $user->id)->get();
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        $date = $this->date;
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        return view('individual/followers',compact('user','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }

    public function following()
    {
        $user = Auth::user();
        $myInitiatives = initiative::where('adminId',$user->id);
        $followers = friend::where('requested_id', $user->id);
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        $date = $this->date;
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        return view('individual/following',compact('user','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }

    public function myUpComingEvents()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $myInitiatives = initiative::where('adminId',$user->id);
        $date = $this->date;
        if($user->userType == 0){
            $userIndividual = Auth::user()->Individuals;
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
            $acceptedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date)->where('accepted',1)->get();
            $requestedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date)->where('accepted',0)->get();
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date)->where('accepted',1);
            return view('individual.myUpComingEvents',compact('user','myUpComingEvents','myArchiveEvents','userIndividual','followers','following','requestedEvents','acceptedEvents','date','myInitiatives'));
        }
        return redirect()->route('home');
    }

    public function myArchiveEvents()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id);
        $date = $this->date;
        $myInitiatives = initiative::where('adminId',$user->id);
        if($user->userType == 0){
            $userIndividual = Auth::user()->Individuals;
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date)->where('accepted',1)->get();
            return view('individual.myArchiveEvents',compact('user','myUpComingEvents','myArchiveEvents','userIndividual','followers','following','acceptedEvents','date','myInitiatives'));
        }
        return redirect()->route('home');
    } 

    /**
     * show specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myInitiatives()
    {
        $date = $this->date;
        $user = Auth::user();
        $myInitiatives = initiative::where('adminId',$user->id)->get();
        $followers = friend::where('requester_id', $user->id);
        $following = friend::where('requested_id', $user->id);
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        return view('individual/myInitiatives',compact('user','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }

    /**
     *show for update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiative($initiativeId)
    {
        $date = $this->date;
        $user = Auth::user();
        $myInitiatives = initiative::where('adminId',$user->id)->get();
        $followers = friend::where('requester_id', $user->id);
        $following = friend::where('requested_id', $user->id);
        $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date);
        $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date);
        $initiative = initiative::join('users','initiatives.user_id','=','users.id')->where('initiatives.id',$initiativeId)->first();
        if($initiative->adminId == $user->id){
            return view('individual/editInitiative',compact('initiative','user','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
        }
    }

    /**
     * update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiativePost($id)
    {
        
    }
}