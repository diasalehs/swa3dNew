<?php 

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\User;
use App\Volunteer;
use App\researches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tags;
use App\invite;
use App\researches_tags;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Response;
use App\Initiative;
class IndividualsController extends Controller
{
    protected $user;
   public function __construct()
    {
        $this->middleware(['auth','individual']);
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeInitiative()
    {
        list($user ,$date)=$this->slidbare();
        return view('individual/makeInitiative');
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
        $adminId = $this->user->id;
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
        list($user ,$date)=$this->slidbare();
        $users_record= user::get();
        $following = friend::where('requester_id', $user->id)->get();
        return view('individual/allusers',compact('users_record','following'));
    }
    public function followers()
    {
        list($user ,$date)=$this->slidbare();
        $followers = friend::join('users','friends.requester_id','=','users.id')->where('requested_id', $user->id)->get();
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        return view('individual/followers',compact('followers','following'));
    }
    public function following()
    {
        list($user ,$date)=$this->slidbare();
        $following = friend::join('users','friends.requested_id','=','users.id')->where('requester_id', $user->id)->get();
        return view('individual/following',compact('following'));
    }
    public function myUpComingEvents()
    {
        $user = $this->user;
        if($user->userType == 0){
            list($user ,$date)=$this->slidbare();
            $acceptedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$user->id)->where('events.endDate','>=',$date)->where('accepted',1)->get();
            $requestedEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$user->id)->where('events.endDate','>=',$date)->where('accepted',0)->get();
            $invitedEvents = invite::join('events','invites.event_id','=','events.id')->where('invites.user_id',$user->id)->where('events.endDate','>=',$date)->where('accepted',0)->get();
            return view('individual.myUpComingEvents',compact('requestedEvents','acceptedEvents','invitedEvents'));
        }
        return abort(403, 'Unauthorized action.');
    }
    public function myArchiveEvents()
    {
        $user = $this->user;
        if($user->userType == 0){
            list($user ,$date)=$this->slidbare();
            $myArchiveEvents = volunteer::join('events','volunteers.event_id','=','events.id')->where('volunteers.user_id',$user->Individuals->id)->where('events.endDate','<',$date)->where('accepted',1)->get();
            return view('individual.myArchiveEvents',compact('myArchiveEvents'));
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
        list($user ,$date)=$this->slidbare();
        $myInitiatives = initiative::where('adminId',$user->id)->get();
        return view('individual/myInitiatives',compact('myInitiatives'));
    }
    public function researcher()
    {
        $user = $this->user;
        $user->Individuals->researcher=1;
        $user->Individuals->save();
        return redirect()->route('home');
    }
    public function addResearch()
    {
        $user = $this->user;
        if($user->Individuals->researcher == 1)
        {
            list($user ,$date)=$this->slidbare();
            $success=0;
            return  view('individual/researches',compact('success'));
        }
        else abort(403, 'Unauthorized action.');
    }
    public function submitResearch(Request $request)
    {
        $user = $this->user;
        $date = $this->date;
        if($user->Individuals->researcher == 1)
        {
            list($user ,$date)=$this->slidbare();
                
            $this->validate($request, [
                'title' => 'required',
                'abstract' => 'required',
                'recommendations' => 'required',
                'creation_date' => 'required',
                'findings' => 'required',
                'tool1' => 'required',
                'tool2' => 'required',
                'credit' => 'required',
                'filefield' => 'required',
            ]);
           
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
        $tags= new tags();
        $tags->name=$request['tags'];
        $tags->save();
        $research_tags= new researches_tags();
        $research_tags->tag_id=$tags->id;
        $research_tags->research_id=$research->id;
        $research_tags->save();
        $success=1;
            return  view('individual/researches',compact('success'));
        }
        else abort(403, 'Unauthorized action.');
    }

    public function myResearches(){
        list($user ,$date)=$this->slidbare();
        $researches=researches::where('ind_id',$user->individuals->id)->get();
        return view('individual/myResearches',compact('researches'));
    }
    
    /**
     *show for update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiative($initiativeId)
    {
        $initiative = initiative::where('initiatives.id',$initiativeId)->first();
        $user = $this->user;
        if($initiative->adminId == $user->id){
            list($user ,$date)=$this->slidbare();
            return view('individual/editInitiative',compact('initiative'));
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