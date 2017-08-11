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
use App\Invite;
use App\researches_tags;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Response;
use App\Initiative;
use App\Intrest;
use App\UserTarget;
use App\UserIntrest;
use App\targetedGroups;


class IndividualsController extends Controller
{
    protected $user;
   public function __construct()
    {
        $this->middleware(['auth','individual']);
        $this->middleware(function ($request, $next) {
            $this->date = date('Y-m-d');
            $this->user = Auth::user();
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
        $intrests = Intrest::get();
        $targets = targetedGroups::get();
        return view('individual/makeInitiative',compact('intrests','targets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function makeInitiativePost(Request $request)
    {
        $$user = $this->user;
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
            'preVoluntary' => 'required',
            'dateOfBirth' => 'required|date|before:today',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $adminId = $this->user->id;
        $user = new User();
        $user->name = "name";
        $user->userType = 3;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->flag = 1;
        $user->save();

        $Initiative = new Initiative();
        $Initiative->adminId = $adminId;
        $Initiative->user_id = $user->id;
        $Initiative->firstInEnglish = $request['firstName'];
        $Initiative->lastInEnglish = $request['lastName'];
        $Initiative->firstInArabic = $request['ARfirst'];
        $Initiative->lastInArabic = $request['ARlast'];
        $Initiative->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
        $Initiative->nameInEnglish = "".$request['firstName']." ".$request['lastName'];

        $Initiative->mobileNumber = $request->mobileNumber;
        $Initiative->address = $request->address;
        $user->name= $Initiative->nameInEnglish;
        $user->save();

        foreach ($request['intrests'] as $i)
        {
            $ui=new UserIntrest;
            $ui->intrest_id = $i;
            $ui->user_id=$user->id;
            $ui->save();
        }

        foreach ($request['targets'] as $t) {
            $ui=new UserTarget;
            $ui->target_id = $t;
            $ui->user_id=$user->id;
            $ui->save();
        }

        $Initiative->email = $user->email;
        $Initiative->cityName = $request['cityName'];
        $Initiative->country = $request['country'];
        $Initiative->preVoluntary = $request['preVoluntary'];
        if($request['preVoluntary'] == 1){
                $Initiative->voluntaryYears = $request['voluntaryYears'];
        }else{$Initiative->voluntaryYears = 0;}
        $Initiative->dateOfBirth =  $request['dateOfBirth'];
        $Initiative->save();
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
                'creation_date' => 'required|date|before:tomorrow',
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
        $alltags=explode(",", $request['hashtags']);
        foreach ($alltags as $t ) {
         $tags= new tags();
        $tags->name=$t;
        $tags->save();
        $research_tags= new researches_tags();
        $research_tags->tag_id=$tags->id;
        $research_tags->research_id=$research->id;
        $research_tags->save();

            # code...
        }
       
        $success=1;
            return  view('individual/researches',compact('success'));
        }
        else abort(403, 'Unauthorized action.');
    }

    public function myResearches(){
        list($user ,$date)=$this->slidbare();
        $researches=researches::where('ind_id',$user->individuals->id)->paginate(8);
        return view('individual/myResearches',compact('researches'));
    }
    
    /**
     *show for update the specified resource .
     *
     * @return \Illuminate\Http\Response
     */
    public function editInitiative($initiativeId)
    {
        $initiative = Initiative::where('initiatives.id',$initiativeId)->first();
        $user = $this->user;
        if($initiative->adminId == $user->id){
            $intrests = Intrest::get();
            $targets = targetedGroups::get();
            list($user ,$date)=$this->slidbare();
            return view('individual/editInitiative',compact('user','initiative','targets','intrests'));
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
            'preVoluntary' => 'required',
            'dateOfBirth' => 'required|date|before:today',
        ]);

        $Initiative = Initiative::where('initiatives.id',$initiativeId)->first();
        if($user->userType == 0 && $Initiative)
        {
            if($Initiative->adminId == $user->id)
            {
                if(isset($request->password))
                {
                    $this->validate($request, [
                        'password' => 'required|string|min:6|confirmed',
                    ]);
                    $user->password = bcrypt($request->password);
                }

                $Initiative->firstInEnglish = $request['firstName'];
                $Initiative->lastInEnglish = $request['lastName'];
                $Initiative->firstInArabic = $request['ARfirst'];
                $Initiative->lastInArabic = $request['ARlast'];
                $Initiative->nameInArabic =  "".$request['ARfirst']." ".$request['ARlast'];
                $Initiative->nameInEnglish = "".$request['firstName']." ".$request['lastName'];
             
                if ($request->hasFile('image'))
                {
                    $picture = $request->file('image');
                    $imagename = time().'.'.$picture->getClientOriginalExtension();
                    Image::make($picture)->save(public_path('pp/'.$imagename));

                    $Initiative->picture = $imagename;
                    $user->picture = $imagename;
                }


            
                $Initiative->mobileNumber = $request->mobileNumber;
                $Initiative->address = $request->address;
                $user->name= $Initiative->nameInEnglish;

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

                $Initiative->email = $user->email;
                $Initiative->cityName = $request['cityName'];
                $Initiative->country = $request['country'];
                $Initiative->preVoluntary = $request['preVoluntary'];
                if($request['preVoluntary'] == 1){
                        $Initiative->voluntaryYears = $request['voluntaryYears'];
                }else{$Initiative->voluntaryYears = 0;}
                $Initiative->dateOfBirth =  $request['dateOfBirth'];
                $Initiative->save();
            }
            return redirect()->route('home');
        }
        abort(403, 'Unauthorized action.');
    }
}