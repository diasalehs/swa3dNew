<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\User;
class searchController extends Controller
{
    public function basic(Request $request)

    {
    $users = DB::table('users')
    ->where([['name', 'like','%'.$request['search'].'%'],['userType','0']])
    ->orwhere([['name', 'like','%'.$request['search'].'%'],['userType','3']])
    ->paginate(8, ['*'], 'users');
    $Events=DB::table('events')->where('title', 'like','%'.$request['search'].'%')->paginate(8,['*'],'events');
   

    $institutes = DB::table('users')
    ->where([['name', 'like','%'.$request['search'].'%'],['userType','1']])
    ->paginate(8,['*'],'institutes');

    return view('results',['users'=>$users,'events'=>$Events,'institutes'=>$institutes ]);
    	# code...
    }
    //
}
