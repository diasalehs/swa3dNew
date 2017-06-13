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
    $results = DB::table('users')->where('name', 'like','%'.$request['search'].'%')->paginate(10);
    $indiv=User::with('Individuals')->get();
    $individuals=DB::table('users')->where('name', 'like','%'.$request['search'].'%')->get();

    	return view('results',['results'=>$results,'indivi'=>$individuals]);
    	# code...
    }
    //
}
