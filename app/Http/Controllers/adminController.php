<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\auth;

class adminController extends Controller
{
    public function delete($userId)
    {
          $data['$userId'] = $userId;

        DB::table('users')->where('id', '=', $data)->delete();
         return redirect()->route('home');

    	# code...
    }
 public function index()
    {
        if(Auth::attempt() || Auth::user()){
        	$user = Auth::user();
        	$users_record= DB::table('users')->get();
        	if ($user->userType=== 10 ) {
        		return view('admin/adminDashboard',["users_record"=>$users_record]);
        	}
        	else{
                return redirect()->route('home');
            }
        }else{
                return redirect()->route('main');
        }
    }

}