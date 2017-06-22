<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Individuals;
use Illuminate\Support\Facades\auth;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\news;
use Image;
class adminController extends Controller
{
    public function delete($userId)
    {
        $user = User::find($userId);
        if($user->userType== 0){        $user->Individuals()->delete();}
        if($user->userType== 1){        $user->Institute()->delete(); }

        $user->delete();
         return redirect()->route('home');

    	# code...
    }


    public function indexx()
    {   $news_record= DB::table('news')->get();
         return view('admin/adminNews',["news_record"=>$news_record]);


        # code...
    }
    public function edit($newsID)

    {
        $news = news::find($newsID);
        return view('admin/editingpage',["news"=>$news]);
    }
     public function adminNewsView()
    {    
        $news_record= DB::table('news')->get();
         return view('admin/adminNewsView',["news_record"=>$news_record]);


        # code...
    }
}
