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

    public function create(Request $request)
    {
        list($user ,$date)=$this->slidbare();

        $this->validate($request, [
            'voluntaryWork' => 'string',
            'role' => 'required|integer',
            'targetedSegment' => 'required|integer|exists:targeted_groups,id',
            'achievements' => 'required|string',
            'achievementFrom' => 'required|date|before:today',
            'achievementTo' => 'date|after:achievementFrom',
        ]);


        $qualification = new Qualification();
        $qualification->user_id = $user->id;
        $qualification->voluntaryWork = $request->voluntaryWork;
        $qualification->role = $request->role;
        $qualification->targetedSegment = $request->targetedSegment;
        $qualification->achievements = $request->achievements;
        $qualification->achievementFrom = $request->achievementFrom;
        $qualification->achievementTo = $request->achievementTo;
        $qualification->save();

        return redirect()->back();
    }

    public function edit(Request $request)
    {
        list($user ,$date)=$this->slidbare();

        $this->validate($request, [
            'voluntaryWorkEdit' => 'string',
            'roleEdit' => 'required|integer',
            'targetedSegmentEdit' => 'required|integer|exists:targeted_groups,id',
            'achievementsEdit' => 'required|string',
            'achievementFromEdit' => 'required|date|before:today',
            'achievementToEdit' => 'date|after:achievementFromEdit',
        ]);
  
        $qualification = Qualification::findOrFail($request->id);
        $qualification->user_id = $user->id;
        $qualification->voluntaryWork = $request->voluntaryWorkEdit;
        $qualification->role = $request->roleEdit;
        $qualification->targetedSegment = $request->targetedSegmentEdit;
        $qualification->achievements = $request->achievementsEdit;
        $qualification->achievementFrom = $request->achievementFromEdit;
        $qualification->achievementTo = $request->achievementToEdit;
        $qualification->save();

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
