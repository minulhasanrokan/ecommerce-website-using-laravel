<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\redirect;

class SuperAdminController extends Controller
{
    public function dashboard(){
        $this->admin_auth_check();
        return view('backend.admin-dashboard');
    }

    //logout
    public function logout(){
        
        Session::flush();
        return redirect::to(path:'/admin');
    }

    public function admin_auth_check(){

        $admin_id = Session::get('admin_id');

        if ($admin_id) {
            // code...
        }
        else{
            return redirect::to(path:'/admin')->send();
        }
    }
}
