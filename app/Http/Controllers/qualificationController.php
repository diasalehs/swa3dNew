<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Qualification;

use Illuminate\Http\Request;

class qualificationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
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

    public function create(Request $request)
    {
        list($user ,$date)=$this->slidbare();
        if($request->has('voluntaryWorkEdit'))
        {
            for($i = 0 ;$i < sizeof($request->voluntaryWorkEdit) ;$i++)
            {   
                $qualification = Qualification::findOrFail($request->id[$i]);
                $qualification->user_id = $user->id;
                $qualification->voluntaryWork = $request->voluntaryWorkEdit[$i];
                $qualification->role = $request->roleEdit[$i];
                $qualification->targetedSegment = $request->targetedSegmentEdit[$i];
                $qualification->achievements = $request->achievementsEdit[$i];
                $qualification->achievementFrom = $request->achievementFromEdit[$i];
                $qualification->achievementTo = $request->achievementToEdit[$i];
                $qualification->save();
            }
        }
        if($request->has('voluntaryWork'))
        {
            for($i = 0 ;$i < sizeof($request->voluntaryWork) ;$i++)
            {   
                $qualification = new Qualification();
                $qualification->user_id = $user->id;
                $qualification->voluntaryWork = $request->voluntaryWork[$i];
                $qualification->role = $request->role[$i];
                $qualification->targetedSegment = $request->targetedSegment[$i];
                $qualification->achievements = $request->achievements[$i];
                $qualification->achievementFrom = $request->achievementFrom[$i];
                $qualification->achievementTo = $request->achievementTo[$i];
                $qualification->save();
            }
        }
        return redirect()->back();
    }

    public function destroy($qualificationId)
    {
        list($user ,$date)=$this->slidbare();
        $qualification = Qualification::findOrFail($qualificationId);
        if($qualification->user_id == $user->id)
        {
            $qualification->delete();
            return redirect()->back();
        }
        else
            return redirect()->route('errorPage')->withErrors('not found.');

    }
}
