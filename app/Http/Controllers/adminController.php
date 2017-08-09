<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Individuals;
use App\Institute;
use App\tempInstitute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;
use App\Http\Requests;
use App\news;
use Image;
use App\PollQuestion;
use App\PollQuestionAnswer;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function slidbare()
    {
        $news_count = $this->news_count;
        return [$news_count];
    }

    public function pollQuestion()
    {
        $pollQuestions = pollQuestion::get();
        return view('admin/pollQuestion',compact('pollQuestions'));
    }

    public function pollQuestionPost(Request $request)
    {
        $pollQuestion = new pollQuestion();
        $pollQuestion->question = $request->question;
        $pollQuestion->save();
        foreach ($request->answers as $answer) 
        {
            $PollQuestionAnswer = new PollQuestionAnswer();
            $PollQuestionAnswer->poll_question_id = $pollQuestion->id;
            $PollQuestionAnswer->answer = $answer;
            $PollQuestionAnswer->save();
        }
        return redirect()->back();
    }

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
    {    
         return view('admin/adminNews');


        # code...
    }
    public function edit($newsID)

    {   
        $news = news::find($newsID);
        return view('admin.editingpage',["news"=>$news]);
    }
     public function adminNewsView()
    {    
        list($news_count)=$this->slidbare();
        $news_record= DB::table('news')->get();
        return view('admin.adminNewsView',compact('news_record','news_count'));
        # code...
    } 
    public function approve($id)
    {   $news= news::find($id);
        $news->approved=1;
        $news->save();
         return redirect()->route('approveNews');

        # code...
    }

    public function approveNews()
    {   
        $news_record= news::where([['approved','0'],['publish','1']])->paginate(10);
         return view('admin/unApprovedNews',["news_record"=>$news_record]);


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
