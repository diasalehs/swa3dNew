<?php

namespace App\Http\Controllers;
use App\User;
use App\Initiative;
use App\Member;
use App\Individuals;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class initiativeController extends Controller
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
    
    public function join($userId)
    {
        $user = $this->user;
        $initiative = Initiative::where('user_id',$userId)->first();
        if($initiative)
        {
            if($user->userType == 0)
            {
                $member = Member::where('individual_id',$user->id)->where('initiative_id',$userId)->first();
                if($member == null)
                {
                    $member = new member();
                    $member->individual_id = $user->id;
                    $member->initiative_id = $userId;
                    $member->accepted = 0;
                    $member->save();
                }else
                    return redirect()->route('errorPage')->withErrors('already joined.');
            }else
                return redirect()->route('errorPage')->withErrors("you can't join.");
        }else
            return redirect()->route('errorPage')->withErrors('not an initiative.');
        return redirect()->back();
    }

    public function disjoin($userId)
    {
        $user = $this->user;
        $initiative = Initiative::where('user_id',$userId)->first();
        if($initiative)
        {
            if($user->userType == 0)
            {
                $member = Member::where('individual_id',$user->id)->where('initiative_id',$userId)->first();
                if($member)
                {
                    $member->delete();
                }else
                    return redirect()->route('errorPage')->withErrors('you are not joined to this initiative.');
            }else
                return redirect()->route('errorPage')->withErrors("you can't join.");
        }else
            return redirect()->route('errorPage')->withErrors('not an initiative.');
        return redirect()->back();
    }

    public function acceptJoin(Request $request ,$userId)
    {
        if($request->has('join'))
        {
            $i = 0;
            $user = $this->user;
            if(!is_array($request->join))
            {
                $request->join = array($request->join);
            }
            if($user->id == $userId)
            {
                if($user->userType == 3)
                {
                    for($i ;$i < sizeof($request->join) ;$i++)
                    {   
                        $volunteerId = $request->join[$i];
                        $Individual = Individuals::where('user_id',$volunteerId)->first();
                        if($Individual)
                        {
                            $member = Member::where('individual_id',$volunteerId)->where('initiative_id',$userId)->first();
                            if($member)
                            {
                                $member->accepted = 1;
                                $member->save();
                            }else
                                return redirect()->route('errorPage')->withErrors("there is no request.");
                        }else
                            return redirect()->route('errorPage')->withErrors("profile not found.");
                    }
                }else
                    return redirect()->route('errorPage')->withErrors("you can't join.");
            }else
                return redirect()->route('errorPage')->withErrors('this initiative not yours.');
        }
        return redirect()->back();
    }

    public function unAcceptJoin(Request $request ,$userId)
    {
        if($request->has('joined'))
        {
            $i = 0;
            $user = $this->user;
            if(!is_array($request->joined))
            {
                $request->joined = array($request->joined);
            }
            if($user->id == $userId)
            {
                if($user->userType == 3)
                {
                    for($i ;$i < sizeof($request->joined) ;$i++)
                    {   
                        $volunteerId = $request->joined[$i];
                        $Individual = Individuals::where('user_id',$volunteerId)->first();
                        if($Individual)
                        {
                            $member = Member::where('individual_id',$volunteerId)->where('initiative_id',$userId)->first();
                            $member->accepted = 0;
                            $member->save();
                        }else
                            return redirect()->route('errorPage')->withErrors("profile not found.");
                    }
                }else
                    return redirect()->route('errorPage')->withErrors("you can't join.");
            }else
                return redirect()->route('errorPage')->withErrors('this initiative not yours.');
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
