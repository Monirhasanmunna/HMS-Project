<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blood;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id','DESC')->get();
        return view('backend.patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $disease = Disease::all();
        $bloods = Blood::all();
        return view('backend.patient.create',compact('doctors','disease','bloods'));
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
            'doctor_id'         => 'required',
            'blood_id'          => 'required',
            'name'              => 'required|string',
            'age'               => 'required',
            'address'           => 'required',
            'mobile'            => 'required',
            'weight'            => 'required',
            'temprature'        => 'required',
            'blood_pressure'    => 'required',
            'pulse'             => 'required',
            'ocupation'         => 'required',
            'religion'          => 'required',
            'sex'               => 'required',
            'maritial_status'   => 'required'
        ]);


        Patient::create([
            'name'              => $request->name,
            'doctor_id'         => $request->doctor_id,
            'age'               => $request->age,
            'address'           => $request->address,
            'mobile'            => $request->mobile,
            'blood_id'          => $request->blood_id,
            'weight'            => $request->weight,
            'maritial_status'   => $request->maritial_status,
            'ocupation'         => $request->ocupation,
            'religion'          => $request->religion,
            'temprature'        => $request->temprature,
            'blood_pressure'    => $request->blood_pressure,
            'pulse'             => $request->pulse,
            'sex'               => $request->sex
        ]);

        notify()->success('Patient Created Successfully');
        return redirect()->route('app.patient.index');
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
    {   $doctors = Doctor::all();
        $bloods  = Blood::all();
        $patient = Patient::findOrfail($id);
        return view('backend.patient.create',compact('patient','doctors','bloods'));
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
            'doctor_id'         => 'required',
            'blood_id'          => 'required',
            'name'              => 'required|string',
            'age'               => 'required',
            'address'           => 'required',
            'mobile'            => 'required',
            'weight'            => 'required',
            'temprature'        => 'required',
            'blood_pressure'    => 'required',
            'pulse'             => 'required',
            'ocupation'         => 'required',
            'religion'          => 'required',
            'sex'               => 'required',
            'maritial_status'   => 'required'
        ]);


        Patient::findOrfail($id)->update([
            'name'              => $request->name,
            'doctor_id'         => $request->doctor_id,
            'age'               => $request->age,
            'address'           => $request->address,
            'mobile'            => $request->mobile,
            'blood_id'          => $request->blood_id,
            'weight'            => $request->weight,
            'maritial_status'   => $request->maritial_status,
            'ocupation'         => $request->ocupation,
            'religion'          => $request->religion,
            'temprature'        => $request->temprature,
            'blood_pressure'    => $request->blood_pressure,
            'pulse'             => $request->pulse,
            'sex'               => $request->sex
        ]);

        notify()->success('Patient Updated Successfully');
        return redirect()->route('app.patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::findOrfail($id);
        $patient->delete();
        return response()->json($patient);

    }
}
