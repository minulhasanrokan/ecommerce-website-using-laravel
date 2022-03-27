<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Unit;
use App\Models\Size;
use App\Models\Color;

use File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        return view('backend.product.create',compact('categories','brands','units','sizes','colors'));
    }


    // get sub category by id 

    public function get_sub_category($id){

        $sub_category_id = SubCategory::where("cat_id", $id)
                        ->where("category_status",1)
                        ->pluck("category_name", "id");
        return response()->json($sub_category_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;


        $product->cat_id=$request->category_name;
        $product->sub_cat_id=$request->sub_category_name;
        $product->brand_id=$request->brand_id;
        $product->unit_id=$request->unit_id;
        $product->size_id=$request->size_id;
        $product->color_id=$request->color_id;

        $product->product_code=$request->product_code;
        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        $product->product_price=$request->product_price;


        $images = array();

        if ($files=$request->file('product_image')) {

            $files = $request->file('product_image');

            $i =0;
            $images = array();
            
            foreach($files as $file){

                $extension = $file->getClientOriginalExtension();

                $fileName = $request->product_name.time().$i.'.'.$extension;

                $file->move('product',$fileName);

                $images[] = $fileName;
                $i++;
            }

            $product->product_image=implode('!',$images);

            $product->save();

            return redirect()->back()->with('message','New Product Created Successfully');
           
        }
        else{
            return redirect()->back()->with('message',' Product Image is Empty!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_product_status(Product $product)
    {
        if ($product->product_status==1) {

            $product->update(['product_status'=>0]);
        }
        elseif ($product->product_status==0) {
            
            $product->update(['product_status'=>1]);
        }

        return redirect()->back()->with('message','Product Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('category_status',1)
                    ->get();
        $categoryId = $product->cat_id;
        $subCategories = SubCategory::where('cat_id',$categoryId)
                    ->get();

        $brands = Brand::where('brand_status',1)
                    ->get();

        $units = Unit::where('unit_status',1)
                    ->get();

        $sizes = Size::where('size_status',1)
                    ->get();

        $colors = Color::where('color_status',1)
                    ->get();

        return view('backend.product.edit',compact('product','categories','subCategories','brands','units','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $updateProduct = $product->update(
            [
                'cat_id'=> $request->category_name,
                'sub_cat_id'=> $request->sub_category_name,
                'brand_id'=> $request->brand_id,
                'unit_id'=> $request->unit_id,
                'size_id'=> $request->size_id,
                'color_id'=> $request->color_id,
                'product_code'=> $request->product_code,
                'product_name'=> $request->product_name,
                'product_description'=> $request->product_description,
                'product_price'=> $request->product_price,
            ]);
        if ($updateProduct) {
            return redirect()->back()->with('message','Product Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product['image'] = explode('!',$product->product_image);

        foreach ($product->image as $images) {

            $filename = public_path().'/product/'.$images;
            
            $deleteImg = File::delete($filename);
        }

        if ($deleteImg==true) {
            $delete = $product->delete();

            if ($delete==true) {
                return redirect()->back()->with('message','Product Has Been Deleted Successfully');
            }
            else{
                return redirect()->back()->with('message','SomeThing Went Wrong!!');
            }
        }
        else{
            return redirect()->back()->with('message','SomeThing Went Wrong!!');
        }
    }
}
