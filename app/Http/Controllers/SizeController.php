<?php

namespace App\Http\Controllers;

use App\Models\Size;

use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::all();
        return view('backend.size.index',compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $size = new Size;

        $sizes = explode(',', $request->size);

        $size->size= json_encode($sizes);

        $size->save();

        return redirect()->back()->with('message','New Sizes Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_size_status(Size $size)
    {
        if ($size->size_status==1) {

            $size->update(['size_status'=>0]);
        }
        elseif ($size->size_status==0) {
            
            $size->update(['size_status'=>1]);
        }

        return redirect()->back()->with('message','Sizes Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit',compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $sizes = explode(',', $request->size);

        $sizes= json_encode($sizes);

        $updateSizes = $size->update(
        [
            'size'=> $sizes,
        ]);

        if ($updateSizes) {
            return redirect()->back()->with('message','Sizes Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        $delete = $size->delete();
        if ($delete==true) {
            return redirect()->back()->with('message','Sizes Has Been Deleted Successfully');
        }
        else{
            return redirect()->back()->with('message','SomeThing Went Wrong!!');
        }
    }
}
