<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\redirect;

use Session;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Shipping;
use Cart;
Use App\Models\Customer;
Use App\Models\Order;
use App\Models\Payment;
use DB;


class CheckoutController extends Controller
{
    // check out

    public function check_out(){

        $customerId = Customer::where('id', Session::get('id'))->first();

        $categories = Category::where('category_status',1)
                    ->get();
        return view('frontend.pages.product-checkout',compact('categories','customerId'));
    }

    public function login_check(){

        $categories = Category::where('category_status',1)
                    ->get();

        return view('frontend.pages.login',compact('categories'));
    }

    public function save_shipping_address(Request $request){
        $data = array();

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['zip_code'] = $request->zip_code;
        $data['mobile'] = $request->mobile;
        $data['note'] = $request->note;

        $s_id = Shipping::insertGetId($data);
        Session::put('shipping-id',$s_id);

        return redirect::to(path:'/payment');
        
    }

    // payment
    public function payment(){
        $categories = Category::where('category_status',1)
                    ->get();

        $cartCullect = Cart::getContent();

        $cartArray = $cartCullect->toArray();

        return view('frontend.pages.product-payment',compact('categories','cartArray'));
    }

    public function order_place(Request $request){

        $paymentMethod = 'bkash';

        $pData = array();

        $pData['payment_method'] = $paymentMethod;
        $pData['status'] = 'pending';

        $payment_id = Payment::insertGetId($pData);

        $orderData = array();

        $orderData['cus_id'] = Session::get('id');

        $orderData['shipping_id'] = Session::get('shipping-id');

        $orderData['pay_id'] = $payment_id;

        $orderData['total'] = Cart::getTotal();

        $orderData['status'] = 'pending';


        $order_id = Order::insertGetId($orderData);


        $cart_cullection = Cart::getContent();

        $oder_details = array();


        foreach ($cart_cullection as $cart_data) {
            
            $oder_details['order_id'] = $order_id;
            $oder_details['product_id'] = $cart_data['id'];
            $oder_details['product_name'] = $cart_data['name'];
            $oder_details['product_price'] = $cart_data['price'];
            $oder_details['product_sale_qauntity'] = $cart_data['quantity'];

            DB::table('order_details')->insert($oder_details);
        }


        if ($paymentMethod=='bkash') {
            Cart::clear();

            $categories = Category::where('category_status',1)
                    ->get();

            return view('frontend.pages.product-payment-success',compact('categories'));
        }
    }
}
