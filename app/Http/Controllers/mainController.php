<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\news;
use App\Individuals;
use App\slider;
use App\Event;
use App\Volunteer;
use App\UserIntrest;
use App\researches;
use App\Institute;
use App\Initiative;
use App\Lesson;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Post;

class mainController extends Controller
{

	public function __construct()
    {
            $this->date = date('Y-m-d');
    }



	public function main() {
		$_3slides=slider::orderBy('created_at','desc')->take(3)->get();
		$volunteers=Individuals::orderBy('acc_avg','desc')->take(5)->get();
		$news_record=news::orderBy('created_at','desc')
        ->where('approved','1')
        ->take(3)->get();
        $researches=researches::orderby('created_at','desc')->take(3)->get();

           $volRec = DB::table('individuals')->count();
           $malesRec=individuals::where('gender','male')->count();
           $femalesRec=individuals::where('gender','female')->count();
           $insRec= DB::table('institutes')->count();
           $resRec=DB::table('researches')->count();
           $eveRec=DB::table('events')->count();



         return view('main',compact('volunteers','_3slides','news_record','researches','volRec','insRec','resRec','eveRec','malesRec','femalesRec'
            ));
	}

	public function upComingEvents(Request $request) {
        $user = Auth::user();
        $date = $this->date;
        $events = event::where('startDate','>',$date)->paginate(5,['*'],'events');
        // location filter
        if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){

                 $events= DB::table("events")->join('event_intrests', function ($join) {
                 $join->on('events.id', '=', 'event_intrests.event_id')
                 ->whereIn('event_intrests.intrest_id', request('intrest'))
                 ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]]);})
                 ->paginate(5,['*'],'events');
                 // location &intrest & target

                 $str=['events.country'=>request('location')];

                 if(request()->has('target')){
                     $events = DB::table('events')
                     ->join('event_intrests', 'events.id', '=', 'event_intrests.event_id')
                     ->join('event_targets', 'events.id', '=', 'event_targets.event_id')
                     ->whereIn('event_targets.target_id',$request['target'])
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]])
                     ->paginate(5,['*'],'events');
                  }

             }
             // location & target
             elseif(request()->has('target')){
                 $events= DB::table("events")->join('event_targets', function ($join) {
                 $join->on('events.id', '=', 'event_targets.event_id')
                 ->whereIn('event_targets.target_id',request('target'))
                 ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]]);})
                 ->paginate(5,['*'],'events');
             }

                // location only filter
             else{
                 $events = event::where([['startDate','>',$date],['country','=',$request['location']]])->paginate(5,['*'],'events');

                 }
             }

         // intrest filter
        elseif(request()->has('intrest')){
             // intrest & target
             if(request()->has('target')){

                 $events = DB::table('events')
                 ->join('event_intrests', 'events.id', '=', 'event_intrests.event_id')
                 ->join('event_targets', 'events.id', '=', 'event_targets.event_id')
                 ->whereIn('event_targets.target_id',$request['target'])
                 ->whereIn('event_intrests.intrest_id', request('intrest'))
                 ->where('events.startDate','>',$this->date)->paginate(5,['*'],'events');
             }
                // intrest only
             else {

                     $events= DB::table("events")
                     ->join('event_intrests', function ($join) {
                     $join->on('events.id', '=', 'event_intrests.event_id')
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where('events.startDate','>',$this->date);})->paginate(5,['*'],'events');
                }
         }
         // target only filter
        elseif(request()->has('target')) {
             $events= DB::table("events")
             ->join('event_targets', function ($join) {
             $join->on('events.id', '=', 'event_targets.event_id')
             ->whereIn('event_targets.target_id',request('target'))
             ->where('events.startDate','>',$this->date);})->paginate(5,['*'],'events');
         }


        if (Auth::check()) {
            if($user->userType==0){
            $Iuser=$user->Individuals;
            }
            elseif ($user->userType==1) {
            $Iuser=$user->Institute;
            }
            
            elseif ($user->userType==3) {
            $Iuser=$user->Initiative;
            }
            if ($Iuser==null){
            return view('comingEvents',compact('events'));

            }
           $userevente= DB::table('event_intrests')
           ->join('events','events.id','=','event_intrests.event_id')
           ->join('user_intrests', function ($join) {
            $join->on('user_intrests.intrest_id', '=', 'event_intrests.intrest_id')
                 ->where('user_intrests.user_id', '=', auth::user()->id)
                 ->where('events.startDate','>',$this->date);})
                 ->get();
            $userevent= array();
            $var=0;
            foreach ($userevente as $e) {
                if ($e->event_id!=$var) {
                    $var=$e->event_id;
                    array_push($userevent, $e);
                    # code...
                }
            }
            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->paginate(5,['*'],'areaEvents');

            $volEvents = volunteer::where('user_id', $Iuser->id)->get();
            $SEvents= array();
            $v=0;
            foreach ($events as $e) {
                if($e->event_id){

                    if ($e->event_id!=$v) {
                    $v=$e->event_id;
                    array_push($SEvents, $e);
                    # code...
                }
            }
                else{
                    if ($e->id!=$v) {
                    $v=$e->id;
                    array_push($SEvents, $e);
                    # code...
                }
            }

            }
            $events=$SEvents;
            $total=count($events);
            $events=collect($events);
            $currentpage= \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
            $events=new \Illuminate\Pagination\LengthAwarePaginator($events,$total,5,$currentpage);

            return view('upComingEvents',compact('text','events','localevents','volEvents','user','userevent'));
        }
        return view('upComingEvents',compact('events'));

    }
    public function allLocal() {
        $user = Auth::user();
        $date = $this->date;

        if (Auth::check()) {
            if($user->userType==0){
            $Iuser=$user->Individuals;

            }
            elseif ($user->userType==1) {
            $Iuser=$user->Institute;

                # code...
              }

            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->paginate(10,['*'],'areaEvents');
            $volEvents = volunteer::where('user_id', $Iuser->id)->get();
            return view('allLocal',compact('localevents','volEvents','user'));
        }

    }
    public function allEvents() {
        $user = Auth::user();
        $volEvents = 0;
        if($user->userType==0){
            $Iuser=$user->Individuals;
            $volEvents = volunteer::where('user_id', $Iuser->id)->get();
        }
        $date = $this->date;
        $events = event::where('startDate','>',$date)->paginate(10,['*'],'events');
        return view('allEvents',compact('events','volEvents','user'));
    }

	public function archiveEvents() {
        $user = Auth::user();
        $date = $this->date;
        $events = event::where('startDate','<',$date)->get();
        return view('archiveEvents',compact('events'));
    }


	public function event($eventId){
    	$event = event::find($eventId);
        $date = $this->date;
        if($event){
            $user = Auth::user();
            $lessons = Lesson::join('users','lessons.user_id','users.id')->where('event_id',$eventId)->get();
        	if(Auth::check())
            {
                $mine = false;
                $archived = 0;
                $request = false;
                $rate = false;

                $eventCloseAllowed = false;
                $posts = post::where('event_id',$eventId)->get();
                $eventAcceptedVols = volunteer::join('users','volunteers.user_id','=','users.id')->where('event_id',$eventId)->where('accepted',1)->get();

                if($event->startDate < $date)
                {
                    $archived = 1;
                    if($event->endDate > $date){$archived = 2;}
                }

                $flag = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->where('accepted',1)->first();
                if($flag) $eventCloseAllowed = true;
                $flag = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->where('rates',1)->first();
                if($flag) $rate = true;

        		if(($user->userType == 1 || $user->userType == 3) && $event->user_id == $user->id){
        			$mine = true;
                    $eventVols = volunteer::join('users','volunteers.user_id','=','users.id')->where('event_id',$eventId)->where('accepted',0)->get();
                    return view('event',compact('date','event','request','archived','mine','user','eventVols','posts','eventAcceptedVols','users','eventCloseAllowed','lessons','rate'));
        		}elseif ($user->userType == 0 || $user->userType == 3) {
                    $volunteer = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->first();
                    if($volunteer){
                        $request = true;
                    }
                }
                return view('event',compact('date','event','eventCloseAllowed','posts','eventAcceptedVols','archived','mine','request','user','lessons','rate'));
        	}
            return view('event',compact('date','event','posts','eventAcceptedVols','eventCloseAllowed','lessons','rate'));
        }else{
            return redirect()->route('upComingEvents');
        }
	}
    
    public function researchView($researchID) {
        $research = researches::where('id',$researchID)->first();
        return view('researchView',compact('research'));

    }
    public function allResearches() {

        $researches= researches::orderBy('created_at')->paginate(8);
        return view('allResearches',compact('researches'));

    }
    public function download($researchID) {
        $research = researches::where('id',$researchID)->first();
            $entry = researches::where('filename', '=', $research->filename)->firstOrFail();

        $file = Storage::disk('local')->get($entry->filename);
        
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
    }
    public function Researches_search(Request $request) {
  
        $results= researches::where('title','like','%'.$request['search'].'%')->paginate(2);
 
        $resultstags= researches::whereHas('tags',function($query)use ($request){
         return $query->where('name',$request['search']);
        })->paginate(2);
 
        $total= $results->total() + $resultstags->total();
        $items= array_merge($results->items(),$resultstags->items());
        $collection=collect($items)->unique();
 
        $currentpage= \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
        $researches=new \Illuminate\Pagination\LengthAwarePaginator($collection,$total,2,$currentpage);
        $text=$request['search'];

       return view('ResearchesSearch',compact('researches','text'));
 
 
      }

      public function institutes(Request $request)

      {

        $NGOs=institute::paginate(3);
          if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){
                 $NGOs= DB::table("institutes")
                 ->join('user_intrests', function ($join) {
                 $join->on('institutes.user_id', '=', 'user_intrests.user_id')
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                ->where([['institutes.nameInEnglish','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                 ->orwhere([['institutes.nameInArabic','like','%'.request('name').'%'],['institutes.country','=',request('location')]]);})

                 ->paginate(3);
                 // location &intrest & target

                 if(request()->has('target')){
                   
                      $NGOs = DB::table('institutes')
                     ->join('user_intrests', 'institutes.user_id', '=', 'user_intrests.user_id')
                     ->join('user_targets', 'institutes.user_id', '=', 'user_targets.user_id')
                     ->whereIn('user_targets.target_id',request('target'))
                     ->whereIn('user_intrests.intrest_id', request('intrest'))
                       ->where([['institutes.nameInEnglish','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                 ->orwhere([['institutes.nameInArabic','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                     ->paginate(3);
                  }

             }
             // location & target** id is userID in  individual (prevously was user.id)  changed to match the location and name ...and target id is target_id 

             elseif(request()->has('target')){
             
                   $NGOs= DB::table("institutes")->join('user_targets', function ($join) {
                 $join->on('institutes.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->where('institutes.country','=',request('location'));})
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->paginate(3);
             }

                // location only filter
             else{
              
                 $NGOs=institute::where('country','=',$request['location'])
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->paginate(3);
                 }
            }

         // intrest filter
         elseif(request()->has('intrest')){

             // intrest & target
             if(request()->has('target')){

              

                  $NGOs = DB::table('institutes')
                 ->join('user_intrests', 'institutes.user_id', '=', 'user_intrests.user_id')
                 ->join('user_targets', 'institutes.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->paginate(3);
             }
                // intrest only
             else {

                     
                      $NGOs= DB::table("institutes")
                     ->join('user_intrests', function ($join) {
                     $join->on('institutes.user_id', '=', 'user_intrests.user_id')
                     ->whereIn('user_intrests.intrest_id', request('intrest'));})
                     ->where('nameInEnglish','like','%'.request('name').'%')
                     ->orwhere('nameInArabic','like','%'.request('name').'%')
                     ->paginate(3);
                }
          }
        
         // target only filter
          elseif(request()->has('target')){
         
             $NGOs= DB::table("institutes")
             ->join('user_targets', function ($join) {
             $join->on('institutes.user_id', '=', 'user_targets.user_id')
             ->whereIn('user_targets.target_id',request('target'))
             ;})
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')

             ->paginate(3);
         }
            
            // -------------
            $NGOss= array();
            $var=0;
            foreach ($NGOs as $u) {
                if ($u->user_id!=$var) {
                    $var=$u->user_id;
                    array_push($NGOss, $u);
                    # code...
                }
            }
            $NGOs=$NGOss;
            $total=count($NGOs);
            $NGOs=collect($NGOs);
            $currentpage= \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
            $NGOs=new \Illuminate\Pagination\LengthAwarePaginator($NGOs,$total,3,$currentpage);

            return view('institutes',compact('NGOs'));
          # code...
      }

}
