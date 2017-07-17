<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Friend;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Event;
use App\news;
use App\EventIntrest;
use App\EventTarget;
use Image;

class instituteController extends Controller
{
	public function __construct()
    {
    	$this->middleware(['auth','institute']);
        $this->middleware(function ($request, $next) {
            $date = date('Y-m-d');
            $user = Auth::user();
            $this->date = $date;
            $this->user = $user;
            return $next($request);
        });
    }
    public function index()
    {
        return view('institute.createNews');
        # code...
    }


 public function edit($newsID)

    {
        $news = news::find($newsID);
        return view('institute.editMyNews',["news"=>$news]);
    }

}
