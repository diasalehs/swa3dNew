<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;
use App\Initiative;
use App\volunteer;
use App\researches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndividualsController extends Controller
{
    protected $user;
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
            $userIndividual = $user->Individuals;
            $myInitiatives = initiative::where('adminId',$user->id);
            $followers = friend::where('requested_id', $user->id);
            $following = friend::where('requester_id', $user->id);
            $researches=researches::where('ind_id',$userIndividual->id);
            $myUpComingEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$userIndividual->id)->where('events.endDate','>=',$date);
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$userIndividual->id)->where('events.endDate','<',$date);
            $this->date = $date;
            $this->user = $user;
            $this->userIndividual = $userIndividual;
            $this->myInitiatives = $myInitiatives;
            $this->followers = $followers;
            $this->following = $following;
            $this->researches= $researches;
            $this->myUpComingEvents = $myUpComingEvents;
            $this->myArchiveEvents = $myArchiveEvents;
            return $next($request);
        });
    }
    public function slidbare()
    {
        $date = $this->date;
        $user = $this->user;
        $userIndividual = $this->userIndividual;
        $myInitiatives = $this->myInitiatives;
        $followers = $this->followers;
        $following = $this->following;
        $researches= $this->researches;
        $myUpComingEvents = $this->myUpComingEvents;
        $myArchiveEvents = $this->myArchiveEvents;
        return [$user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives ,$date];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeInitiative()
    {
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        return view('individual/makeInitiative',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeInitiativePost(Request $request)
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
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        $users_record= DB::table('users')->get();
        return view('individual/allusers',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','users_record'));
    }
    public function followers()
    {
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        $followers = friend::join('users','friends.requester_id','=','users.id')->where('requested_id', $user->id)->get();
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        return view('individual/followers',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }
    public function following()
    {
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        return view('individual/following',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }
    public function myUpComingEvents()
    {
        $user = Auth::user();
        if($user->userType == 0){
            list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
            $acceptedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date)->where('accepted',1)->get();
            $requestedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','>=',$date)->where('accepted',0)->get();
            return view('individual.myUpComingEvents',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','requestedEvents','acceptedEvents'));
        }
        return abort(403, 'Unauthorized action.');
    }
    public function myArchiveEvents()
    {
        $user = Auth::user();
        if($user->userType == 0){
            list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('individual_id',$user->Individuals->id)->where('events.endDate','<',$date)->where('accepted',1)->get();
            return view('individual.myArchiveEvents',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','acceptedEvents'));
        }
        return abort(403, 'Unauthorized action.');
    } 
    /**
     * show specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myInitiatives()
    {
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        $myInitiatives = initiative::where('adminId',$user->id)->get();
        return view('individual/myInitiatives',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }
    public function researcher()
    {
        $user->Individuals->researcher=1;
        $user->Individuals->save();
        return redirect()->route('home');
    }
    public function addResearch()
    {
        $user = Auth::user();
        if($user->Individuals->researcher == 1)
        {
            list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
            $success=0;
            return  view('individual/researches',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','success'));
        }
        else abort(403, 'Unauthorized action.');
    }
    public function submitResearch(Request $request)
    {
        $user = Auth::user();
        if($user->Individuals->researcher == 1)
        {
            list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
                
            $this->validate($request, [
                'title' => 'required',
                'abstract' => 'required',
                'recommendations' => 'required',
                'creation_date' => 'required',
                'findings' => 'required',
                'tool1' => 'required',
                'tool2' => 'required',
                'credit' => 'required',
                'filefield' => 'integer',
            ]);
            $research=new researches();
            $research->title=$request['title'];
            $research->ind_id=$userIndividual->id;
            $research->researcher_name=$userIndividual->nameInEnglish;
            $research->abstract=$request['abstract'];
            $research->recommendations=$request['recommendations'];
            $research->creation_date=$request['creation_date'];
            $research->findings=$request['findings'];
            $research->tool1=$request->input('tool1');
            $research->tool2=$request->input('tool2');
            $research->credit=$request->input('credit');
            $file = $request->file('filefield');
            if($file)
            {
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                $research->mime = $file->getClientMimeType();
                $research->original_filename = $file->getClientOriginalName();
                $research->filename = $file->getFilename().'.'.$extension;
            }else abort(403, 'Unauthorized action.');
            $research->save();
            $success=1;
            return  view('individual/researches',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','success'));
        }
        else abort(403, 'Unauthorized action.');
    }
    public function myResearches(){
        list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
        return view('individual/myResearches',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives'));
    }
    
    /**
     *show for update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiative($initiativeId)
    {
        $initiative = initiative::where('initiatives.id',$initiativeId)->first();
        $user = Auth::user();
        if($initiative->adminId == $user->id){
            list($user ,$userIndividual ,$researches ,$myUpComingEvents, $myArchiveEvents, $followers, $following, $myInitiatives,$date)=$this->slidbare();
            return view('individual/editInitiative',compact('user','researches','myUpComingEvents','myArchiveEvents','followers','following','myInitiatives','initiative'));
        }
    }
        /**
     * update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiativePost(Request $request ,$initiativeId)
    {
        $user = $this->user;
        $initiative = initiative::where('initiatives.id',$initiativeId)->first();
            if($user->userType == 0 && $initiative)
            {
                if($initiative->adminId == $user->id)
                {
                    $user = $initiative->user;
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
                return redirect()->route('home');
            }
            abort(403, 'Unauthorized action.');
    }
}