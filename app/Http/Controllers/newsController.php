<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\news;
use App\Http\Controllers\Controller;

class newsController extends Controller
{
    public function create( Request $request)

    {
    	

     // extract img path from img  object in the request ((from saleh))
    	$anew = new news;
    	if($request->hasFile('mainImg'))
    	{ 

    	   $image = $request->file('mainImg');
           $imageName = $image->getClientOriginalName();
           $imageName = $anew->id.'_'.$imageName;
           Storage::disk('public')->put($imageName, file_get_contents($image));
    	}
    	else $imageName="";
        $anew->title = $request['title'];
        $anew->mainImgpath = $imageName;
        $anew->textarea = $request['textarea'];


        $anew->save();
        return redirect()->route('news');



    	 # code...
    }
    public function index()
    {  	$news_record= DB::table('news')->get();
         return view('admin/adminNews',["news_record"=>$news_record]);


    	# code...
    }
    public function delete($newsID)
    {
        $news = news::find($newsID);
        $news->delete();
        return redirect()->route('news');

    	# code...
    }
    //
}
