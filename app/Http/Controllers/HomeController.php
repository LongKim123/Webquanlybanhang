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
        $category=DB::table('loaisanpham')->orderby('id','desc')->get();
        $product=DB::table('sanpham')->orderby('id_sp','desc')->limit(6)->get();
        return  view('pages.home')->with('product',$product)->with('category',$category);
        
    }
  
}
