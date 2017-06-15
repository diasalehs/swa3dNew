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
    $users = DB::table('users')->where('name', 'like','%'.$request['search'].'%')->paginate(6, ['*'], 'users');
    $Events=DB::table('events')->where('title', 'like','%'.$request['search'].'%')->paginate(4,['*'],'events');

    	return view('results',['users'=>$users,'events'=>$Events]);
    	# code...
    }
    //
}
