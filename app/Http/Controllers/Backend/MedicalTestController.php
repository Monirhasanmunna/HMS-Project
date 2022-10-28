<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MedicalTest;
use Illuminate\Http\Request;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalTests = MedicalTest::all();
        return view('backend.medicalTest.index',compact('medicalTests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('backend.medicalTest.create');
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
            'name'            => 'required',          
        ]);

        MedicalTest::create([
            'name'             => $request->name,
        ]);

        notify()->success('Medicine Created Successfully');
        return redirect()->route('app.medical.test.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalTest  $medicalTest
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalTest $medicalTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalTest  $medicalTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalTest = MedicalTest::findOrfail($id);                
        return view('backend.medicalTest.create',compact('medicalTest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalTest  $medicalTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'            => 'required',
        ]);

        MedicalTest::findOrfail($id)->update([
            'name'             => $request->name,
        ]);

        notify()->success('Medicine Updated Successfully');
        return redirect()->route('app.medical.test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalTest  $medicalTest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicalTest = MedicalTest::findOrfail($id);
        $medicalTest->delete();
        return response()->json($medicalTest);
    }
}
