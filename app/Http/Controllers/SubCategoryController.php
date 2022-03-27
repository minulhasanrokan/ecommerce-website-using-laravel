<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();

        return view('backend.subcategory.index',compact('subCategories'));
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
        return view('backend.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subCategory = new SubCategory;

        $subCategory->id=$request->subCategory;

        $subCategory->category_name=$request->category_name;
        $subCategory->cat_id=$request->category;
        $subCategory->category_description=$request->category_description;

        $subCategory->save();

        return redirect()->back()->with('message','New Sub Category Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_sub_category_status(SubCategory $subCategory)
    {
        if ($subCategory->category_status==1) {

            $subCategory->update(['category_status'=>0]);
        }
        elseif ($subCategory->category_status==0) {
            
            $subCategory->update(['category_status'=>1]);
        }

        return redirect()->back()->with('message','Category Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();

        return view('backend.subcategory.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $updateSubCategory = $subCategory->update(
        [
            'category_name'=> $request->category_name,
            'cat_id'=> $request->category,
            'category_description'=> $request->category_description,
        ]);

        if ($updateSubCategory) {
            return redirect()->back()->with('message','Sub Category Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $delete = $subCategory->delete();
        if ($delete==true) {
            return redirect()->back()->with('message','Sub Category Has Been Deleted Successfully');
        }
        else{
            return redirect()->back()->with('message','SomeThing Went Wrong!!');
        }
    }
}
