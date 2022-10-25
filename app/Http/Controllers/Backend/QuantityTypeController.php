<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuantityType;
use Illuminate\Http\Request;

class QuantityTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantityTypes = QuantityType::all();
        return view('backend.quantityType.index',compact('quantityTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.quantityType.create');
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
            'name'  => 'required|unique:quantity_types'
        ]);

        QuantityType::create([
            'name'  => $request->name
        ]);

        notify()->success('Quantity Type Created Successfully');
        return redirect()->route('app.quantity.type.index');
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
        $quantityType = QuantityType::findOrfail($id);
        return view('backend.quantityType.create',compact('quantityType'));
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

        QuantityType::findOrfail($id)->update([
            'name'  => $request->name
        ]);

        notify()->success('Quantity Type Updated Successfully');
        return redirect()->route('app.quantity.type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quantityType = QuantityType::findOrfail($id);
        $quantityType->delete();
        return response()->json($quantityType);
    }
}
