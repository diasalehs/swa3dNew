<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
        return view('allNews',["news"=>news::paginate(3)]);


# code...
    } 


}
