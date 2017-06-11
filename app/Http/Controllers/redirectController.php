<?php 
namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Individuals;
use App\Institute;
use App\Researcher;
use App\User;
use Illuminate\Support\Facades\auth;


class redirectController extends Controller
{
	public function index(){
		$users = User::all();
		return view('redirect',['users' => $users]);
	}
}