<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\dmLaptop;
use App\Http\Requests\EditLapRequest;
use App\Http\Requests\AddLapRequest;

class dmLaptopController extends Controller
{
    //
    public function getLap(){
        $data['laplist']=dmLaptop::all();
        return view('backend.dm_laptop',$data);
    }
    public function postLap(AddLapRequest $request){
        $dmlap=new dmLaptop;
        $dmlap->lap_name=$request->name;
        $dmlap->lap_slug=str_slug($request->name);
        $dmlap->save();
        return back();
    }

    public function getEditLap($id){
        $data['lap']=dmLaptop::find($id);
        return view('backend.editlap',$data);
    }
    public function postEditLap(EditLapRequest $request,$id){
        $dmlap=dmLaptop::find($id);
        $dmlap->lap_name=$request->name;
        $dmlap->lap_slug=str_slug($request->name);
        $dmlap->save();
        return redirect()->intended('admin/dmlaptop');
    }

    public function getDeleteLap($id){
        dmLaptop::destroy($id);
        return back();
    }
}
