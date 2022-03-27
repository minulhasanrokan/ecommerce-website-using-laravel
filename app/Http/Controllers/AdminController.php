<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\redirect;
use Session;
session_start();

class AdminController extends Controller
{
    public function index(){
        return view('backend.admin-login');
    }

    public function admin_dashboard(Request $request){

        $adminEmail = $request->email;
        $adminPass = md5($request->password);

        $result = Admin::where('admin_email',$adminEmail)
                ->where('admin_password',$adminPass)
                ->first();
        if ($result) {
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return redirect::to(path:'/dashboard');
        }
        else{
            Session::put('message','Your Email Or Password Is Wrong!!!');
            return redirect::to(path:'/admin');
        }
    }
}
