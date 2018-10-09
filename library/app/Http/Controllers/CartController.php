<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\spLaptop;
use Mail;
class CartController extends Controller
{
    //
    public function getAddCart($id){
        $product=Product::find($id);
        // $lap=spLaptop::find($id);
        
        Cart::add([[
            'id' => $id,
            'name' => $product->prod_name,
            'price' => $product->prod_price,
            'quantity' => 1,
            'attributes' => ['img'=>$product->prod_img],
        ],
            // [
            // 'id' => $id,
            // 'name' => $lap->splap_name,
            // 'price' => $lap->splap_price,
            // 'quantity' => 1,
            // 'attributes' => ['img'=>$lap->splap_img],
            // ],
        ]);
        return redirect('cart/show');       
    }
    public function getShowCart(){
        $data['total']=Cart :: getTotal ();
        $data['items']=Cart::getContent();
        return view('frontend.cart',$data);
    }
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::clear();
        }
        else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request){
        Cart::update($request->id,['quantity'=>['relative' => false,'value' => $request->quantity]]);
    }
    public function postComplete(Request $request){
        $data['info']=$request->all();
        $email=$request->email;
        $data['total']=Cart::getTotal();
        $data['cart']=Cart::getContent();
        Mail::send('frontend.email',$data,function($messange) use ($email){
            $messange->from('trinhquangtien2803@gmail.com','Tien');
            $messange->to($email,$email);
            $messange->cc('vipprono1vlz@gmail.com','Hai');
            $messange->subject('Xác nhận hóa đơn mua hàng Vietproshop');
        });
        Cart::clear();
        return redirect('complete');
    }
    public function getComplete(){
        return view('frontend.complete');
    }
}
