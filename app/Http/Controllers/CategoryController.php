<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $category = new Category;

        $category->id=$request->category;
        $categoryName = $request->category_name;
        $category->category_name=$categoryName;
        $category->category_description=$request->category_description;

        $categoryName = str_replace(' ','-',$categoryName);

        if ($request->hasFile('category_image')) {

            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = $categoryName.time().'.'.$extension;

            $file->move('category',$fileName);

            $category->category_image=$fileName;

            // code...
        }

        $category->save();

        return redirect()->back()->with('message','New Category Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_category_status(Category $category){
        
        if ($category->category_status==1) {

            $category->update(['category_status'=>0]);
        }
        elseif ($category->category_status==0) {
            
            $category->update(['category_status'=>1]);
        }

        return redirect()->back()->with('message','Category Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        if ($request->hasFile('category_image')) {

            $exestingImage  = $category->category_image;

            $filename = public_path().'/category/'.$exestingImage;
            
            File::delete($filename);

            $file = $request->file('category_image');
            $extension = $file->getClientOriginalExtension();

            $fileName = time().'.'.$extension;

            $file->move('category',$fileName);


            $updateCategory = $category->update(
            [
                'category_name'=> $request->category_name,
                'category_description'=> $request->category_description,
                'category_image'=> $fileName,
            ]);

        }
        else{

            $updateCategory = $category->update(
            [
                'category_name'=> $request->category_name,
                'category_description'=> $request->category_description,
            ]);
        }

        if ($updateCategory) {
            return redirect()->back()->with('message','Category Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $image = $category->category_image;

        $filename = public_path().'/category/'.$image;
            
        $deleteImg = File::delete($filename);

        if ($deleteImg==true) {
            $delete = $category->delete();

            if ($delete==true) {
                return redirect()->back()->with('message','Category Has Been Deleted Successfully');
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
