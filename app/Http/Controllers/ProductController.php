<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{

     public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            Redirect::to('dashboard');
        }
        else{
            Redirect::to('admin')->send();

        }
    }
    public function add_product(){
        $this->AuthLogin();
    	$cate_product=DB::table('loaisanpham')->orderby('id','desc')->get();
    	return view('admin.add_product')->with('cate_product',$cate_product);

    }
   
    public function all_product(){
        $this->AuthLogin();

    	$all_product=DB::table('sanpham')
    	->join('loaisanpham','sanpham.idsanpham','=','loaisanpham.id')->orderby('sanpham.id_sp','desc')->get();
    	$manager_product= view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product',$manager_product);

    }
    public function save_product(Request $request){
        $this->AuthLogin();
    	$data=array();
    	$data['tensanpham']=$request->product_name;
    	$data['giasanpham']=$request->product_price;
    	$data['hinhanh']=$request->product_image;
    	$data['motasanpham']=$request->product_desc;
    	$data['idsanpham']=$request->product_cate;
    	
    	DB::table('sanpham')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('/add-product');


    }

     public function edit_product($product_id){
        $this->AuthLogin();
     	$cate_product=DB::table('loaisanpham')->orderby('id','desc')->get();
    	$edit_product=DB::table('sanpham')->where('id_sp',$product_id)->get();
    	$manager_product= view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);
    	return view('admin_layout')->with('admin.edit_product',$manager_product);

    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();

    	$data=array();
    	$data['tensanpham']=$request->product_name;
    	$data['giasanpham']=$request->product_price;
    	$data['hinhanh']=$request->product_image;
    	$data['motasanpham']=$request->product_desc;
    	$data['idsanpham']=$request->product_id;
    	
    	DB::table('sanpham')->where('id_sp',$product_id)->update($data);
    	Session::put('message','Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('all-product');


    }
    public function delete_product($product_id){
        $this->AuthLogin();
    	DB::table('sanpham')->where('id_sp',$product_id)->delete();
    	Session::put('message','Xóa sản phẩm thành công');
    	return Redirect::to('all-product');


    }
}
