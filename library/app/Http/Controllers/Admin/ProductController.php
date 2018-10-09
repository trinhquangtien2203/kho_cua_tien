<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use DB;
class ProductController extends Controller
{
    //
    public function getProduct(){
        $data['productlists']=DB::table('vp_products')->join('vp_categoryes','vp_products.prod_cate','=','vp_categoryes.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
    }
    public function getAddProduct(){
        $data['catelists']=Category::all();
        return view('backend.addproduct',$data);
    }
    public function postAddProduct(AddProductRequest $request){
        $file_name=$request->img->getClientOriginalName();
        $product= new Product;
        $product->prod_name=$request->name;
        $product->prod_slug=str_slug($request->name);
        $product->prod_price=$request->price;
        $product->prod_img=$file_name;
        $product->prod_accessories=$request->accessories;
        $product->prod_warranty=$request->warranty;
        $product->prod_promotion=$request->promotion;
        $product->prod_condition=$request->condition;
        $product->prod_status=$request->status;
        $product->prod_description=$request->description;
        $product->prod_cate=$request->cate;
        $product->prod_featured=$request->featured;
        $product->save();
        $request->img->storeAs('avarta',$file_name);
        return back();
    }
    public function getEditProduct($id){
        $data['productlist']=Product::find($id);
        $data['listcate']=Category::all();
        return view('backend.editproduct',$data);
    }
    public function postEditProduct(Request $request, $id){
        $product= new Product;
        $arr['prod_name']=$request->name;
        $arr['prod_slug']=str_slug($request->name);
        $arr['prod_price']=$request->price;
        $arr['prod_accessories']=$request->accessories;
        $arr['prod_warranty']=$request->warranty;
        $arr['prod_promotion']=$request->promotion;
        $arr['prod_condition']=$request->condition;
        $arr['prod_status']=$request->status;
        $arr['prod_description']=$request->description;
        $arr['prod_cate']=$request->cate;
        $arr['prod_featured']=$request->featured;
        if($request->hasFile('img')){
            $img=$request->img->getClientOriginalName();
            $arr['prod_img']=$img;
            $request->img->storeAs('avarta'.$img);
        }
        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product');
    }
    public function getDeleteProduct($id){
        Product::destroy($id);
        return back();
    }
}
