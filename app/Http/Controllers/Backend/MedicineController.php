<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Medicinegroup;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('backend.medicine.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicinegroups = Medicinegroup::all();
        return view('backend.medicine.create',compact('medicinegroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'medicinegroup_id'=> 'required',
            'name'            => 'required',
            'mg'              => 'required'
        ]);

        Medicine::create([
            'medicinegroup_id' => $request->medicinegroup_id,
            'name'             => $request->name,
            'mg'               => $request->mg
        ]);

        notify()->success('Medicine Created Successfully');
        return redirect()->route('app.medicine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicine = Medicine::findOrfail($id);
        $medicinegroups = Medicinegroup::all();
        return view('backend.medicine.create',compact('medicine','medicinegroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'medicinegroup_id'=> 'required',
            'name'            => 'required',
            'mg'              => 'required'
        ]);

        Medicine::findOrfail($id)->update([
            'medicinegroup_id' => $request->medicinegroup_id,
            'name'             => $request->name,
            'mg'               => $request->mg
        ]);

        notify()->success('Medicine Updated Successfully');
        return redirect()->route('app.medicine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicine = Medicine::findOrfail($id);
        $medicine->delete();
        return response()->json($medicine);
    }
}
