<?php

namespace App\Http\Controllers;

use App\Models\Unit;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        return view('backend.unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = new Unit;

        $unit->unit_name=$request->unit_name;
        $unit->unit_description=$request->unit_description;

        $unit->save();

        return redirect()->back()->with('message','New Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_unit_status(Unit $unit)
    {
        if ($unit->unit_status==1) {

            $unit->update(['unit_status'=>0]);
        }
        elseif ($unit->unit_status==0) {
            
            $unit->update(['unit_status'=>1]);
        }

        return redirect()->back()->with('message','Unit Status Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {

        return view('backend.unit.edit',compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $updateUnit = $unit->update(
        [
            'unit_name'=> $request->unit_name,
            'unit_description'=> $request->unit_description,
        ]);

        if ($updateUnit) {
            return redirect()->back()->with('message','Unit Has Been Updated Successfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $delete = $unit->delete();
        if ($delete==true) {
            return redirect()->back()->with('message','Unit Has Been Deleted Successfully');
        }
        else{
            return redirect()->back()->with('message','SomeThing Went Wrong!!');
        }
    }
}
