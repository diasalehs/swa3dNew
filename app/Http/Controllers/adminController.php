<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Individuals;
use App\Institute;
use App\tempInstitute;
use Illuminate\Support\Facades\auth;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\news;
use Image;
class adminController extends Controller
{
    public function delete($userId)
    {
        // $user = User::find($userId);
        // if($user->userType== 0){        $user->Individuals()->delete();}
        // if($user->userType== 1){        $user->Institute()->delete(); }

        // $user->delete();

        $user = tempInstitute::find($userId);
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
    public function adminVerify($userID)
    {
        $user=tempInstitute::find($userID);
            $Institute=new Institute;
            $Institute->nameInEnglish =  $user->nameInEnglish;
            $Institute->nameInArabic =$user->nameInArabic;
            $Institute->user_id =  $user->user_id;
            $Institute->livingPlace =$user->livingPlace;
            $Institute->cityName = $user->cityName;
            $Institute->country = $user->country;
            $Institute->license = $user->license;
            $Institute->workSummary =$user->workSummary ;
            $Institute->activities = $user->activities ;
            $Institute->mobileNumber = $user->mobileNumber;
            $Institute->email = $user->email;
            $Institute->address = $user->address;
            $Institute->save();
            $userVerified=user::find($Institute->user_id);
            $userVerified->adminApproval=1;
            $userVerified->save();



        
        $user->delete();
        $users_record= tempInstitute::paginate();
         return redirect()->route('home',compact('users_record'));
        # code...
    }
}
