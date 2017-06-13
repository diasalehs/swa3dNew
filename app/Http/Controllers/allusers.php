<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\auth;
use App\friend;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class allusers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allusers()
    {
            $user = Auth::user();
            $followers = friend::where('requested_id', $user->id)->get();
            $following = friend::where('requester_id', $user->id)->get();
            $users_record= User::paginate(10);
            return view('individual/allusers',compact('user','users_record','following','followers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function followers()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id)->get();
        $following = friend::where('requester_id', $user->id)->get();
        return view('individual/followers',compact('user','followers','following'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function following()
    {
        $user = Auth::user();
        $followers = friend::where('requested_id', $user->id);
        $following = friend::where('requester_id', $user->id)->get();
        return view('individual/following',compact('user','followers','following'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function follow( $userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->first();
        if(!$friend){
            $friend = new friend();
            $friend->requester_id = Auth::user()->id;
            $friend->requested_id = $userId;
            $friend->save();
        }
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfollow($userId)
    {
        $user = Auth::user();
        $friend = DB::table('friends')->where('requester_id', '=', $user->id)
                      ->where('requested_id', '=', $userId)->delete();
        // $user->friend()->attach($userId, ['requested_id' => $user->id, 'requester_id' => $userId]);
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
