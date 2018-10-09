<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    //
    public function getNews(){
        $data['list']=News::orderBy('news_id','desc')->get();
        return view('frontend.news',$data);
    }
    public function getContentNews($id){
        $data['comments']=News::find($id);
        return view('frontend.connews',$data);
    }
}
