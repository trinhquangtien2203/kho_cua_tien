<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\spLaptop;
use App\Models\Lapcomment;

class LaptopController extends Controller
{
    //
    public function getLap(){
        $data['list']=spLaptop::where('splap_featured',1)->orderBy('splap_id','desc')->take(8)->get();
        $data['prod']=spLaptop::orderBy('splap_id','desc')->take(8)->get();
        return view('frontend.laptop',$data);
    }
    public function getDetail($id){
        $data['item']=spLaptop::find($id);
        $data['comments']=Lapcomment::where('lapcom_lap',$id)->orderBy('lapcom_id','desc')->paginate(2);
        return view('frontend.lapdetal',$data);
    }
    public function postComment(Request $request,$id){
        $comment=new Lapcomment;
        $comment->lapcom_name=$request->name;
        $comment->lapcom_email=$request->email;
        $comment->lapcom_content=$request->content;
        $comment->lapcom_lap=$id;
        $comment->save();
        return back();
    }
}
