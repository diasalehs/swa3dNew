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
use App\Review;


class mainController extends Controller
{ 
   
	public function __construct()
    {
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
        list($user ,$date)=$this->slidbare();
        $events = event::where('startDate','>',$date)->orderBy('startDate','asc')
        ->paginate(5,['*'],'events');
        // location filter
        if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){

                 $events= DB::table("events")->join('event_intrests', function ($join) {
                 $join->on('events.id', '=', 'event_intrests.event_id')
                 ->whereIn('event_intrests.intrest_id', request('intrest'))
                 ->where([['events.startDate','>',$date],['events.country','=',request('location')]]);})
                 ->get();
                 // location &intrest & target

                 $str=['events.country'=>request('location')];

                 if(request()->has('target')){
                     $events = DB::table('events')
                     ->join('event_intrests', 'events.id', '=', 'event_intrests.event_id')
                     ->join('event_targets', 'events.id', '=', 'event_targets.event_id')
                     ->whereIn('event_targets.target_id',$request['target'])
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]])
                     ->get();
                  }

             }
             // location & target
             elseif(request()->has('target')){
                 $events= DB::table("events")->join('event_targets', function ($join) {
                 $join->on('events.id', '=', 'event_targets.event_id')
                 ->whereIn('event_targets.target_id',request('target'))
                 ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]]);})
                 ->get();
             }

                // location only filter
             else{
                 $events = event::where([['startDate','>',$date],['country','=',$request['location']]])->get();

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
                 ->where('events.startDate','>',$date)->get();
             }
                // intrest only
             else {

                     $events= DB::table("events")
                     ->join('event_intrests', function ($join) {
                     $join->on('events.id', '=', 'event_intrests.event_id')
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where('events.startDate','>',$date);})->get();
                }
         }
         // target only filter
        elseif(request()->has('target')) {
             $events= DB::table("events")
             ->join('event_targets', function ($join) {
             $join->on('events.id', '=', 'event_targets.event_id')
             ->whereIn('event_targets.target_id',request('target'))
             ->where('events.startDate','>',$date);})->get();
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
                ->orderBy('startDate','asc')
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
            $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->orderBy('startDate','asc')->get();

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

            return view('upComingEvents',compact('events','localevents','volEvents','user','userevent'));
        }

        return view('upComingEvents',compact('events'));

    }
    public function allEvents($event =null,Request $request=null) {

        $date = $this->date;

        if($event==1){
            $events=array();
        }
        if($event==2){
        $localevents = event::where('startDate','>',$date)->where('country','=',$Iuser->country)->orderBy('startDate','asc')->get();
        $events=$localevents;

        }

        if($event==3){


            $userevente= DB::table('event_intrests')
           ->join('events','events.id','=','event_intrests.event_id')
           ->join('user_intrests', function ($join) {
            $join->on('user_intrests.intrest_id', '=', 'event_intrests.intrest_id')
                 ->where('user_intrests.user_id', '=', auth::user()->id)
                 ->where('events.startDate','>',$this->date);})
                ->orderBy('startDate','asc')
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
            $events=$userevent;
        }
        elseif($request!=null){
             if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){

                 $events= DB::table("events")->join('event_intrests', function ($join) {
                 $join->on('events.id', '=', 'event_intrests.event_id')
                 ->whereIn('event_intrests.intrest_id', request('intrest'))
                 ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]]);})
                 ->get();
                 // location &intrest & target

                 $str=['events.country'=>request('location')];

                 if(request()->has('target')){
                     $events = DB::table('events')
                     ->join('event_intrests', 'events.id', '=', 'event_intrests.event_id')
                     ->join('event_targets', 'events.id', '=', 'event_targets.event_id')
                     ->whereIn('event_targets.target_id',$request['target'])
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]])
                     ->get();
                  }

             }
             // location & target
             elseif(request()->has('target')){
                 $events= DB::table("events")->join('event_targets', function ($join) {
                 $join->on('events.id', '=', 'event_targets.event_id')
                 ->whereIn('event_targets.target_id',request('target'))
                 ->where([['events.startDate','>',$this->date],['events.country','=',request('location')]]);})
                 ->get();
             }

                // location only filter
             else{
                 $events = event::where([['startDate','>',$date],['country','=',$request['location']]])->get();

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
                 ->where('events.startDate','>',$this->date)->get();
             }
                // intrest only
             else {

                     $events= DB::table("events")
                     ->join('event_intrests', function ($join) {
                     $join->on('events.id', '=', 'event_intrests.event_id')
                     ->whereIn('event_intrests.intrest_id', request('intrest'))
                     ->where('events.startDate','>',$this->date);})->get();
                }
         }
         // target only filter
        elseif(request()->has('target')) {
             $events= DB::table("events")
             ->join('event_targets', function ($join) {
             $join->on('events.id', '=', 'event_targets.event_id')
             ->whereIn('event_targets.target_id',request('target'))
             ->where('events.startDate','>',$this->date);})->get();
         }
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
        }

        return view('allEvents',compact('events'));
    }

	public function archiveEvents() {
        list($user ,$date)=$this->slidbare();
        $events = event::where('startDate','<',$date)->get();
        return view('archiveEvents',compact('events'));
    }



	public function event($eventId){
    	$event = event::find($eventId);
        if($event){
            list($user ,$date)=$this->slidbare();
            $lesson = null;
            $reviews = null;
            $eventCloseAllowed = false;
            $mine = false;
            $archived = 0;
            $request = false;
            $eventVols = null;

        	if(Auth::check()) 
            {
                $reviews = Review::join('users','reviews.user_id','users.id')->where('event_id',$eventId)->get();
                $lesson = Lesson::where('event_id',$event->id)->where('user_id',$user->id)->first();
                $eventAcceptedVols = volunteer::join('users','volunteers.user_id','=','users.id')->where('event_id',$eventId)->where('accepted',1)->get();

                if($event->startDate < $date)
                {
                    $archived = 1;
                    if($event->endDate > $date){$archived = 2;}
                }

                $flag = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->where('accepted',1)->first();
                if($flag) $eventCloseAllowed = true;

        		if($event->user_id == $user->id)
                {
        			$mine = true;
                    if($user->userType == 1 || $user->userType == 3)
                    {
                        $eventVols = volunteer::join('users','volunteers.user_id','=','users.id')->where('event_id',$eventId)->where('accepted',0)->get();
                    }
                }
    		    if ($user->userType == 0 || $user->userType == 3) 
                {
                    $volunteer = volunteer::where('event_id',$eventId)->where('user_id',$user->id)->first();
                    if($volunteer) $request = true;
                }
        	}
            return view('event',compact('date','event','eventCloseAllowed','eventAcceptedVols','archived','mine','request','user','reviews','lesson','eventVols'));
        }
        return redirect()->route('errorPage')->withErrors("this event not found.");
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

