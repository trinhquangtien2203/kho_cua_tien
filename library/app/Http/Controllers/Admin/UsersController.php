<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

class UsersController extends Controller
{
    //
    public function getUsers(){
        $data['users']=Users::all();
        $data['items']=Users::where('level','=',1)->orderBy('id','desc')->paginate(1);
        return view('backend.admin',$data);
    }
    public function getAddUsers(){
        return view('backend.add');
    }
    public function postAddUsers(AddUserRequest $request){
        $user=new Users;
        $user->email=$request->mail;
        $user->password=bcrypt($request->pass);
        $user->level=$request->level;
        $user->save();
        return back();
    }
    public function getEditUsers($id){
        $user['list']=Users::find($id);
        return view('backend.edit',$user);
    }
    public function postEditUsers(EditUserRequest $request,$id){
        $user= new Users;
        $arr['email']=$request->mail;
        $arr['password']=bcrypt($request->pass);
        $arr['level']=$request->level;
        $user::where('id',$id)->update($arr);
        return redirect('admin/user');
    }
    public function getDelUsers($id){
        Users::destroy($id);
        return back();
    }
}
