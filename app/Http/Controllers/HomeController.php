<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size; 
use App\Models\Color;
use App\Models\Product;

use App\Models\OrderDetails;
use DB;

class HomeController extends Controller
{
    public function index(){
        
        $categories = Category::where('category_status',1)
                    ->get();

        $brands = Brand::where('brand_status',1)
                    ->get();

        $units = Unit::where('unit_status',1)
                    ->get();

        $sizes = Size::where('size_status',1)
                    ->get();

        $colors = Color::where('color_status',1)
                    ->get();

        $products = Product::where('product_status',1)
                    ->limit(12)
                    ->get();

        // top selling..

        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sale_qauntity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }

        return view('frontend.welcome',compact('categories','brands','units','sizes','colors','products','topProducts'));
    }

    // view product details

    public function view_product_details($id){

        $categories = Category::where('category_status',1)
                    ->get();

        $brands = Brand::where('brand_status',1)
                    ->get();

        $units = Unit::where('unit_status',1)
                    ->get();

        $product = Product::findOrFail($id);

        $sizes = Size::where('size_status',1)
                    ->where('id',$product->size_id)
                    ->get();

        $colors = Color::where('color_status',1)
                    ->where('id',$product->color_id)
                    ->get();

        $catId = $product->cat_id;

        $relatedProducts = Product::where('product_status',1)
                    ->where('cat_id',$catId)
                    ->limit(8)
                    ->get();

        return view('frontend.pages.view-details-product',compact('categories','brands','units','sizes','colors','product','relatedProducts'));
    }

    // product by category
    public function product_by_category($id){

        $categories = Category::where('category_status',1)
                    ->get();

        $subCategories = SubCategory::where('category_status',1)
                    ->where('cat_id',$id)
                    ->get();

        $brands = Brand::where('brand_status',1)
                    ->get();

        $products = Product::where('product_status',1)
                    ->where('cat_id',$id)
                    ->limit(15)
                    ->get();

        return view('frontend.pages.product-by-category',compact('categories','subCategories','brands','products'));
    }


     // product by sub category
    public function product_by_sub_category($id){

        $categories = Category::where('category_status',1)
                    ->get();


        $brands = Brand::where('brand_status',1)
                    ->get();

        $products = Product::where('product_status',1)
                    ->where('sub_cat_id',$id)
                    ->limit(15)
                    ->get();

        return view('frontend.pages.product-by-sub-category',compact('categories','brands','products'));
    }

     // product by brand
    public function product_by_brand($id){

        $categories = Category::where('category_status',1)
                    ->get();

         $subCategories = SubCategory::where('category_status',1)
                    ->get();

        $products = Product::where('product_status',1)
                    ->where('sub_cat_id',$id)
                    ->limit(15)
                    ->get();

        return view('frontend.pages.product-by-brand',compact('categories','subCategories','products'));
    }


    public function search(Request $request){

        $categories = Category::where('category_status',1)
                    ->get();

        $products=Product::orderBy('id','desc')->where('product_name','LIKE','%'.$request->product.'%');
        if($request->category != "ALL") $products->where('cat_id',$request->category);
        $products= $products->get();
        $subCategories= SubCategory::all();
        $brands= Brand::all();

        return view('frontend.pages.product-by-category',compact('categories','subCategories','brands','products'));
    }
}
