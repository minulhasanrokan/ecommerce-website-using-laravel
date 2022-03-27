<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\redirect;

use App\Models\Customer;

use Session;

class CustomerController extends Controller
{
    // customer registration
    public function customer_registration(Request $request){
        $data = array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->mobile;
        $data['password']=$request->password;
        $id = Customer::insertGetId($data);
        Session::put('id',$id);
        Session::put('name',$request->name);

        return redirect::to(path:'/check-out');
    }

    // customer login
    public function customer_login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $result =Customer::where('email',$email)
                        ->where('password',$password)
                        ->first();
        if ($result) {
            Session::put('id',$result->id);
            Session::put('name',$result->name);
            return redirect::to(path:'/check-out');
        }
        else{
            return redirect::to(path:'/login-check');
        }
    }

    public function cus_logout(){
        Session::flush();
        return redirect::to(path:'/');
    }
}
