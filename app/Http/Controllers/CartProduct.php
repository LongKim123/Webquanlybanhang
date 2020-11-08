<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
session_start();


class CartProduct extends Controller
{

    public function savecart(Request $request){
    	$product_id=$request->product_idhiden;
    	$quantity=$request->qty;
    	$data=DB::table('sanpham')->where('id_sp',$product_id)->first();
    	$category=DB::table('loaisanpham')->orderby('id','desc')->get();
    	return view('pages.cart.show_cart')->with('category',$category);

    }
    public function update_cart(Request $request){
        $data=$request->all();
        $cart=Session::get('cart');
        if($cart==true){
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach($cart as $session=>$val)
                {
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty']=$qty;
                    }
                }
                # code...
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('mesage','Cập nhật sản phẩm thành công');
        }

    }
    public function delete_cart($session_id){
        $cart=Session::get('cart');
        // echo'<pre>';
        //     print_r($cart);
        // echo'</pre>';
        if($cart==true){
            foreach ($cart as $key => $value) {
                if($value['session_id']==$session_id){
                    unset($cart[$key]);
                }
                # code...
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('mesage','xóa sản phẩm thành công');

        }
        else{
             return Redirect()->back()->with('mesage','xóa sản phẩm thất bại');

        }

    }
    public function gio_hang(Request $request){
    	$url_canonical=$request->url();
    	//$data=DB::table('sanpham')->where('id_sp',$product_id)->first();
    	$category=DB::table('loaisanpham')->orderby('id','desc')->get();
    	return view('pages.cart.cart_ajax')->with('category',$category);

    }
    public function add_to_cart(Request $request){
    	$data=$request->all();
    	$session_id=substr(md5(microtime()),rand(0,26),5);
    	$cart=Session::get('cart');
    	if($cart==true){
    		$is_avaiable=0;
    		foreach ($cart as $key => $val) {
    			if($val['product_id']==$data['cart_product_id'])
    			{
    				$is_avaiable++;
    			}
    			

    		}
    		if($is_avaiable==0){
    			$cart[]=array(
    			'session_id'=>$session_id,
    			'product_name'=>$data['cart_product_name'],
    			'product_id'=>$data['cart_product_id'],
    			'product_image'=>$data['cart_product_image'],
    			'product_price'=>$data['cart_product_price'],
    			'product_qty'=>$data['cart_product_qty'],
    		);
    			Session::put('cart',$cart);

    		}

    	}
    	else{
    		$cart[]=array(
    			'session_id'=>$session_id,
    			'product_name'=>$data['cart_product_name'],
    			'product_id'=>$data['cart_product_id'],
    			'product_image'=>$data['cart_product_image'],
    			'product_price'=>$data['cart_product_price'],
    			'product_qty'=>$data['cart_product_qty'],
    		);

    		
    	}
    	 Session::put('cart',$cart);
    	Session::save();

    }
}
