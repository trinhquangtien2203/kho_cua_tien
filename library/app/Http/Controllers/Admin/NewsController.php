<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\EditNewsRequest;
class NewsController extends Controller
{
    //
    public function getNews(){
        $data['list']=News::all();
        return view('backend/news',$data);
    }
    public function getAddNews(){
        return view('backend.addnews');
    }
    public function postAddNews(Request $request){
        $new=new News;
        $new->news_title=$request->name;
        $new->news_content=$request->description;
        $new->save();
        return back();
    }
    public function getEditNews($id){
        $data['list']=News::find($id);
        return view('backend.editnews',$data);
    }
    public function postEditNews(EditNewsRequest $request,$id){
        $new= new News;
        $arr['news_title']=$request->name;
        $arr['news_content']=$request->description;
        $new::where('news_id',$id)->update($arr);
        return redirect('admin/news');
    }
    public function getDelNews($id){
        News::destroy($id);
        return back();
    }
}
