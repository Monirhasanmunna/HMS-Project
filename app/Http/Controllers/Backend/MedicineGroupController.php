<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Medicinegroup;
use Illuminate\Http\Request;

class MedicineGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicinegroups = Medicinegroup::all();
        return view('backend.medicinegroup.index',compact('medicinegroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.medicinegroup.create');
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
            'name'  => 'required|unique:medicinegroups'
        ]);

        Medicinegroup::create([
            'name'  => $request->name
        ]);

        notify()->success('Medicine Groups Created Successfully');
        return redirect()->route('app.medicinegroup.index');
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
        $medicinegroup = Medicinegroup::findOrfail($id);
        return view('backend.medicinegroup.create',compact('medicinegroup'));
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
            'name'  => 'required'
        ]);

        Medicinegroup::findOrfail($id)->update([
            'name'  => $request->name
        ]);

        notify()->success('Medicine Groups Updated Successfully');
        return redirect()->route('app.medicinegroup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicinegroup = Medicinegroup::findOrfail($id);
        $medicinegroup->delete();
        return response()->json($medicinegroup);
    }
}
