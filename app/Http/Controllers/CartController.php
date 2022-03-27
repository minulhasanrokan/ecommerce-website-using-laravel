<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    // add to cart
    public function add_to_cart(Request $request){

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $product=Product::where('id',$productId)
                ->first();

        $data['quantity']=$quantity;
        $data['id']=$product->id;
        $data['name']=$product->product_name;
        $data['price']=$product->product_price;

        $data['attributes']=[$product->product_image];

        Cart::add($data);

        cart_array();

        return redirect()->back();
    }

    // delete from cart
    public function delete_cart($id){

        Cart::remove($id);

        return redirect()->back();
    }
}
