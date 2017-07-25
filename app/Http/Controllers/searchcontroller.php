<?php

namespace App\Http\Controllers;
use App\Friend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\User;
use App\Individuals;
use App\Institute;
use App\Event;

class searchController extends Controller
{

    public function __construct()
    {
            $this->date = date('Y-m-d');
    }
    public function basic(Request $request)

        {
        $users = DB::table('Individuals')
        ->where('nameInEnglish', 'like','%'.$request['name'].'%')
        ->orwhere('nameInArabic', 'like','%'.$request['name'].'%')
        ->paginate(8, ['*'], 'users');
        $institutes = DB::table('institutes')
        ->where('nameInEnglish', 'like','%'.$request['name'].'%')
        ->orwhere('nameInArabic', 'like','%'.$request['name'].'%')
        ->paginate(8,['*'],'institutes');

        return view('results',['users'=>$users,'institutes'=>$institutes ]);
    	# code...
    }

    public function basicSearch(Request $request)

     {

        if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){

                 $users= DB::table("Individuals")
                 ->join('user_intrests', function ($join) {
                 $join->on('Individuals.user_id', '=', 'user_intrests.user_id')
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ;})
                 ->where([['Individuals.nameInEnglish','like','%'.request('name').'%'],['Individuals.country','=',request('location')]])
                 ->orwhere([['Individuals.nameInArabic','like','%'.request('name').'%'],['Individuals.country','=',request('location')]])

                 ->get();
                 
                 $NGOs= DB::table("institutes")
                 ->join('user_intrests', function ($join) {
                 $join->on('institutes.user_id', '=', 'user_intrests.user_id')
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                ->where([['institutes.nameInEnglish','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                 ->orwhere([['institutes.nameInArabic','like','%'.request('name').'%'],['institutes.country','=',request('location')]]);})

                 ->get();
                 // location &intrest & target

                 if(request()->has('target')){
                     $users = DB::table('Individuals')
                     ->join('user_intrests', 'Individuals.user_id', '=', 'user_intrests.user_id')
                     ->join('user_targets', 'Individuals.user_id', '=', 'user_targets.user_id')
                     ->whereIn('user_targets.target_id',request('target'))
                     ->whereIn('user_intrests.intrest_id', request('intrest'))
                     ->where([['Individuals.nameInEnglish','like','%'.request('name').'%'],['Individuals.country','=',request('location')]])
                     ->orwhere([['Individuals.nameInArabic','like','%'.request('name').'%'],['Individuals.country','=',request('location')]])
                     ->get();
                      $NGOs = DB::table('institutes')
                     ->join('user_intrests', 'institutes.user_id', '=', 'user_intrests.user_id')
                     ->join('user_targets', 'institutes.user_id', '=', 'user_targets.user_id')
                     ->whereIn('user_targets.target_id',request('target'))
                     ->whereIn('user_intrests.intrest_id', request('intrest'))
                       ->where([['institutes.nameInEnglish','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                 ->orwhere([['institutes.nameInArabic','like','%'.request('name').'%'],['institutes.country','=',request('location')]])
                     ->get();
                  }

             }
             // location & target** id is userID in  individual (prevously was user.id)  changed to match the location and name ...and target id is target_id 

             elseif(request()->has('target')){
                 $users= DB::table("Individuals")->join('user_targets', function ($join) {
                 $join->on('Individuals.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->where('Individuals.country','=',request('location'));})
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();
                   $NGOs= DB::table("institutes")->join('user_targets', function ($join) {
                 $join->on('institutes.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->where('institutes.country','=',request('location'));})
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();
             }

                // location only filter
             else{
                 $users = Individuals::where('country','=',$request['location'])
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();
                 $NGOs=institute::where('country','=',$request['location'])
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();
                 }
            }

         // intrest filter
         elseif(request()->has('intrest')){

             // intrest & target
             if(request()->has('target')){

                 $users = DB::table('Individuals')
                 ->join('user_intrests', 'Individuals.user_id', '=', 'user_intrests.user_id')
                 ->join('user_targets', 'Individuals.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();

                  $NGOs = DB::table('institutes')
                 ->join('user_intrests', 'institutes.user_id', '=', 'user_intrests.user_id')
                 ->join('user_targets', 'institutes.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
                 ->get();
             }
                // intrest only
             else {

                     $users= DB::table("Individuals")
                     ->join('user_intrests', function ($join) {
                     $join->on('Individuals.user_id', '=', 'user_intrests.user_id')
                     ->whereIn('user_intrests.intrest_id', request('intrest'));})
                       ->where('nameInEnglish','like','%'.request('name').'%')
                       ->orwhere('nameInArabic','like','%'.request('name').'%')

                     ->get();
                      $NGOs= DB::table("institutes")
                     ->join('user_intrests', function ($join) {
                     $join->on('institutes.user_id', '=', 'user_intrests.user_id')
                     ->whereIn('user_intrests.intrest_id', request('intrest'));})
                     ->where('nameInEnglish','like','%'.request('name').'%')
                     ->orwhere('nameInArabic','like','%'.request('name').'%')
                     ->get();
                }
          }
        
         // target only filter
          elseif(request()->has('target')){
             $users= DB::table("Individuals")
             ->join('user_targets', function ($join) {
             $join->on('Individuals.user_id', '=', 'user_targets.user_id')
             ->whereIn('user_targets.target_id',request('target'))
             ;})
             ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')
             ->get();
             $NGOs= DB::table("institutes")
             ->join('user_targets', function ($join) {
             $join->on('institutes.user_id', '=', 'user_targets.user_id')
             ->whereIn('user_targets.target_id',request('target'))
             ;})
                 ->where('nameInEnglish','like','%'.request('name').'%')
                 ->orwhere('nameInArabic','like','%'.request('name').'%')

             ->get();
         }
            $userss= array();
            $var=0;
            foreach ($users as $u) {
                if ($u->user_id!=$var) {
                    $var=$u->user_id;
                    array_push($userss, $u);
                    # code...
                }
            }
            $users=$userss;
            $total=count($users);
            $users=collect($users);
            $currentpage= \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
            $users=new \Illuminate\Pagination\LengthAwarePaginator($users,$total,10,$currentpage);
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
            $NGOs=$userss;
            $total=count($NGOs);
            $NGOs=collect($NGOs);
            $currentpage= \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();
            $NGOs=new \Illuminate\Pagination\LengthAwarePaginator($NGOs,$total,10,$currentpage);
            return view('filteredResults',compact('users','NGOs'));

     }


    public function volunteersSearch(Request $request)

    {  

        $user =auth::user();
        $following = friend::where('requester_id', $user->id)->get();

         if(request()->has('location')){
             // intrest in location

             if(request()->has('intrest')){

                 $users= DB::table("Individuals")
                 ->join('user_intrests', function ($join) {
                 $join->on('Individuals.user_id', '=', 'user_intrests.user_id')
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ;})
                 ->where('Individuals.country','=',request('location'))
                 ->get();
                 
                 // location &intrest & target

                 if(request()->has('target')){
                     $users = DB::table('Individuals')
                     ->join('user_intrests', 'Individuals.user_id', '=', 'user_intrests.user_id')
                     ->join('user_targets', 'Individuals.user_id', '=', 'user_targets.user_id')
                     ->whereIn('user_targets.target_id',request('target'))
                     ->whereIn('user_intrests.intrest_id', request('intrest'))
                     ->where('Individuals.country','=',request('location'))
                     ->get();
                    
                  }

             }
             // location & target** id is userID in  individual (prevously was user.id)  changed to match the location and name ...and target id is target_id 

             elseif(request()->has('target')){
                 $users= DB::table("Individuals")->join('user_targets', function ($join) {
                 $join->on('Individuals.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->where('Individuals.country','=',request('location'));})
                 ->get();
                 
             }

                // location only filter
             else{
                 $users = Individuals::where('country','=',$request['location'])
             ->get();
                 }
            }

         // intrest filter
         elseif(request()->has('intrest')){

             // intrest & target
             if(request()->has('target')){

                 $users = DB::table('Individuals')
                 ->join('user_intrests', 'Individuals.user_id', '=', 'user_intrests.user_id')
                 ->join('user_targets', 'Individuals.user_id', '=', 'user_targets.user_id')
                 ->whereIn('user_targets.target_id',request('target'))
                 ->whereIn('user_intrests.intrest_id', request('intrest'))
                 ->get();

             }
                // intrest only
             else {

                     $users= DB::table("Individuals")
                     ->join('user_intrests', function ($join) {
                     $join->on('Individuals.user_id', '=', 'user_intrests.user_id')
                     ->whereIn('user_intrests.intrest_id', request('intrest'));})
                     ->get();
              
                }
          }
        
         // target only filter
          elseif(request()->has('target')){
             $users= DB::table("Individuals")
             ->join('user_targets', function ($join) {
             $join->on('Individuals.user_id', '=', 'user_targets.user_id')
             ->whereIn('user_targets.target_id',request('target'))
             ;})
             ->get();
            
         }
            // $userss= array();
            // $var=0;
            // foreach ($users as $u) {
            //     if ($u->user_id!=$var) {
            //         $var=$u->user_id;
            //         array_push($userss, $u);
            //         # code...
            //     }
            // }
            $users_record=$users; 
          // lazy to change all the variables  names :3 :P 
            return view('shared.findVolunteers',compact('users_record','following'));

     

         # code...
    } 

}


