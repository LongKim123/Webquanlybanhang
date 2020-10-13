<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
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
    public function add_product_category(){
        $this->AuthLogin();
    	return view('admin.add_category_product');

    }
   
    public function all_category_product(){
        $this->AuthLogin();
    	$all_category_product=DB::table('loaisanpham')->get();
    	$manager_category_product= view('admin.all_category_product')->with('all_category_product',$all_category_product);
    	return view('admin_layout')->with('admin.all_category_product',$manager_category_product);

    }
    public function save_category_product(Request $request){
        $this->AuthLogin();
    	$data=array();
    	$data['tenloaisanpham']=$request->category_product_name;
    	$data['hinhanhloaisanpham']=$request->category_product_desc;
    	
    	DB::table('loaisanpham')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');


    }

     public function edit_category_product($category_product_id){
        $this->AuthLogin();
    	$edit_category_product=DB::table('loaisanpham')->where('id',$category_product_id)->get();
    	$manager_category_product= view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
    	return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);

    }
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();

    	$data=array();
    	$data['tenloaisanpham']=$request->category_product_name;
    	$data['hinhanhloaisanpham']=$request->category_product_desc;
    	
    	DB::table('loaisanpham')->where('id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');


    }
    public function delete_product_category($category_product_id){
        $this->AuthLogin();
    	DB::table('loaisanpham')->where('id',$category_product_id)->delete();
    	Session::put('message','Xóa danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');


    }
}
