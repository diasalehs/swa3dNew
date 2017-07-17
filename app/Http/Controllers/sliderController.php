<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\slider;
use App\news;


class sliderController extends Controller
{
      public function add_element(Request $request)
    {
        # code...
         $slide=new slider;
        $slide->title = $request['title'];
        $slide->textarea = $request['textarea'];
        if ($request->hasFile('mainImg')){
           $mainImg=$request->file('mainImg');
            $imagename=time().'.'.$mainImg->getClientOriginalExtension();
            Image::make($mainImg)->resize(350,200)->save(public_path('sliderimages/'.$imagename));
        $slide->mainImgpath = $imagename;
        }

        $slide->save();
        return redirect()->route('slider');
    }
      public function index()
    {
        $news_count= news::where('approved','0')->count();
    	return view('admin/sliderconfig',compact('news_count'));
        # code...
    }
    //
}
