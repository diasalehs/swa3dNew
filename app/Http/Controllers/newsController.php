<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\news;
use App\Http\Controllers\Controller;
use Image;
class newsController extends Controller
{

    public function create( Request $request)

    {

// extract img path from img  object in the request    
        $anew=new news;     
        $anew->title = $request['title'];
        $anew->textarea = $request['textarea'];
        if ($request->hasFile('mainImg')){
            $mainImg=$request->file('mainImg');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('uploads/'.$imagename));
            $anew->mainImgpath = $imagename;
        }

        $anew->save();
        return redirect()->route('news');


# code...
    } 



 public function editMynews(Request $request,$newsID)

    {
        $news = news::find($newsID);
        $news->title = $request['title'];
        $news->textarea = $request['textarea'];
        if ($request->hasFile('mainImg')){
            $mainImg=$request->file('mainImg');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('uploads/'.$imagename));
            $news->mainImgpath = $imagename;
        }

        $news->save();
        return redirect()->route('editMynews',["news"=>$news]);


    }  
    public function myNews()
    {
        $news=news::where('institute_id',auth::user()->institute->id)->paginate(10);
        return view('institute.myNews',compact('news'));
        # code...
    }
    public function CreateNews(Request $request)
    {
             $news=new news;     
        $news->title = $request['title'];
        $news->institute_id=auth::user()->institute->id;
        $news->textarea = $request['textarea'];
        if ($request->hasFile('mainImg')){
            $mainImg=$request->file('mainImg');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('uploads/'.$imagename));
            $news->mainImgpath = $imagename;
        }

        $news->save();
        return view('institute.viewNews',compact('news'));
        # code...
    }
    public function editor(Request $request,$newsID)

    {
        $anew = news::find($newsID);
        $anew->title = $request['title'];
        $anew->textarea = $request['textarea'];
        if ($request->hasFile('mainImg')){
            $mainImg=$request->file('mainImg');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('uploads/'.$imagename));
            $anew->mainImgpath = $imagename;
        }

        $anew->save();
        return redirect()->route('edit',["news"=>$anew]);


    }  




    public function delete($newsID)
    {
        $news = news::find($newsID);
        $news->delete();
        return redirect()->route('news');

# code...
    }
    public function view($newsID)
    {    $news = news::find($newsID);

        return view('singleNews',["news"=>$news]);


# code...
    }
    public function allNews()

    {    
        $news_record=news::orderBy('created_at','desc')
        ->where('approved','1')
        ->paginate(5);
        return view('allNews',["news"=>$news_record]);


# code...
    } 


}
