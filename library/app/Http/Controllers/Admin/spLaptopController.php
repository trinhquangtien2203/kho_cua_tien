<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\spLaptop;
use App\Models\dmLaptop;
use DB;
use App\Http\Requests\AddSpLapRequest;

class spLaptopController extends Controller
{
    //
    public function getSpLap(){
        $data['laplist']=DB::table('vp_splaptop1')->join('vp_dmlaptop','vp_splaptop1.splap_lap','=','vp_dmlaptop.lap_id')->orderBy('splap_id','desc')->get();
        return view('backend.sp_laptop',$data);
    }
    public function getAddSpLap(){
        $data['lists']=dmLaptop::all();
        return view('backend.addlaptop',$data);
    }
    public function postAddSpLap(AddSpLapRequest $request){
        $file_name=$request->img->getClientOriginalName();
        $splap= new spLaptop;
        $splap->splap_name=$request->name;
        $splap->splap_slug=str_slug($request->name);
        $splap->splap_price=$request->price;
        $splap->splap_img=$file_name;
        $splap->splap_accessories=$request->accessories;
        $splap->splap_warranty=$request->warranty;
        $splap->splap_promotion=$request->promotion;
        $splap->splap_condition=$request->condition;
        $splap->splap_status=$request->status;
        $splap->splap_description=$request->description;
        $splap->splap_lap=$request->cate;
        $splap->splap_featured=$request->featured;
        $splap->save();
        $request->img->storeAs('avarta',$file_name);
        return back();
    }
    public function getEditSplap($id){
        $data['list']=spLaptop::find($id);
        $data['listcate']=dmLaptop::all();
        return view('backend.editlaptop',$data);
    }
    public function postEditSpLap(Request $request,$id){
        $splap= new spLaptop;
        $arr['splap_name']=$request->name;
        $arr['splap_slug']=str_slug($request->name);
        $arr['splap_price']=$request->price;
        $arr['splap_accessories']=$request->accessories;
        $arr['splap_warranty']=$request->warranty;
        $arr['splap_promotion']=$request->promotion;
        $arr['splap_condition']=$request->condition;
        $arr['splap_status']=$request->status;
        $arr['splap_description']=$request->description;
        $arr['splap_lap']=$request->cate;
        $arr['splap_featured']=$request->featured;
        if($request->hasFile('img')){
            $img=$request->img->getClientOriginalName();
            $arr['splap_img']=$img;
            $request->img->storeAs('avarta'.$img);
        }
        $splap::where('splap_id',$id)->update($arr);
        return redirect('admin/splaptop');
    }
    public function getDeleteSpLap($id){
        spLaptop::destroy($id);
        return back();
    }
}
