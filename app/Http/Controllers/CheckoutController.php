<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
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
    public function manage_order(){
    	$this->AuthLogin();
    	
    	$all_order=DB::table('donhang')
    	->join('account','donhang.idaccount','=','account.id_ac')
    	->select('donhang.*','account.username','account.address')
    	->orderby('donhang.id')->get();
    	$manager_order= view('admin.manage_order')->with('all_order',$all_order);
    	return view('admin_layout')->with('admin.all_manage_order',$manager_order);
    }
    public function view_order($order_id){
    	$this->AuthLogin();
    	$order_by_id=DB::table('chitietdonhang')
    	->join('donhang','chitietdonhang.iddonhang','=','donhang.id')
    	->select('chitietdonhang.*','donhang.id')->where('chitietdonhang.iddonhang',$order_id)->get();
    	$order_acc=DB::table('donhang')
    	->join('account','account.id_ac','=','donhang.idaccount')
    	->select('donhang.*','account.*')->where('donhang.id',$order_id)->get();
    	$manager_order_by_id=view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_acc',$order_acc);
    	
    	return view ('admin_layout')->with('admin.view_order',$manager_order_by_id);
    }
}
