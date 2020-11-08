<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
session_start();

class AccountController extends Controller
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
    public function all_account(){
    	$all_account=DB::table('account')->get();
    	$manager_account=view('admin.all_account')->with('all_account',$all_account);
    	return view ('admin_layout	')->with('all_account',$manager_account);

    }
}
