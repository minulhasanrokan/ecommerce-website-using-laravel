<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('backend.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand = new Brand;

        $brand->id=$request->brand;
        $brandName = $request->brand_name;
        $brand->brand_name=$brandName;
        $brand->brand_description=$request->brand_description;

        $brandName = str_replace(' ','-',$brandName);

        if ($request->hasFile('brand_image')) {

            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $brandName.time().'.'.$extension;

            $file->move('brand',$fileName);

            $brand->brand_image=$fileName;

            // code...
        }

        $brand->save();

        return redirect()->back()->with('message','New Brand Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_brand_status(Brand $brand)
    {
        if ($brand->brand_status==1) {

            $brand->update(['brand_status'=>0]);
        }
        elseif ($brand->brand_status==0) {
            
            $brand->update(['brand_status'=>1]);
        }

        return redirect()->back()->with('message','Brand Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if ($request->hasFile('brand_image')) {

            $exestingImage  = $brand->brand_image;

            $filename = public_path().'/brand/'.$exestingImage;
            
            File::delete($filename);

            $file = $request->file('brand_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;

            $file->move('brand',$fileName);


            $updateBrand = $brand->update(
            [
                'brand_name'=> $request->brand_name,
                'brand_description'=> $request->brand_description,
                'brand_image'=> $fileName,
            ]);

        }
        else{

            $updateBrand = $brand->update(
            [
                'brand_name'=> $request->brand_name,
                'brand_description'=> $request->brand_description,
            ]);
        }

        if ($updateBrand) {
            return redirect()->back()->with('message','Brand Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $image = $brand->brand_image;

        echo $filename = public_path().'/brand/'.$image;
            
        $deleteImg = File::delete($filename);

        if ($deleteImg==true) {
            $delete = $brand->delete();

            if ($delete==true) {
                return redirect()->back()->with('message','Brand Has Been Deleted Successfully');
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
