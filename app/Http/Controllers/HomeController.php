<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
    	return view('pages.home');
    }
    public function product(){
    	$product=DB::table('sanpham')->get();
    	$manager_product= view('pages.home')->with('product',$product);
    	return view('layout')->with('pages.home',$manager_product);
    }
}
