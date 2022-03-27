<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderDetails;


use File;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){

        $orders = Order::all();

        return view('backend.order.manage-order',compact('orders'));
    }

    public function view_order($id){

        $order = Order::where('id',$id)->first();

        $orderDetails = OrderDetails::where('order_id',$order->id)->get();

        return view('backend.order.view-order',compact('order','orderDetails'));
    }
}
