<?php

namespace App\Http\Controllers;

use App\Models\Color;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('backend.color.index',compact('colors'));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color;

        $colors = explode(',', $request->color);

        $color->color= json_encode($colors);

        $color->save();

        return redirect()->back()->with('message','New Colors Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_color_status(Color $color)
    {
        if ($color->color_status==1) {

            $color->update(['color_status'=>0]);
        }
        elseif ($color->color_status==0) {
            
            $color->update(['color_status'=>1]);
        }

        return redirect()->back()->with('message','Colors Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('backend.color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $colors = explode(',', $request->color);

        $colors= json_encode($colors);

        $updateColors = $color->update(
        [
            'color'=> $colors,
        ]);

        if ($updateColors) {
            return redirect()->back()->with('message','Colors Has Been Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $delete = $color->delete();
        if ($delete==true) {
            return redirect()->back()->with('message','Colors Has Been Deleted Successfully');
        }
        else{
            return redirect()->back()->with('message','SomeThing Went Wrong!!');
        }
    }
}
