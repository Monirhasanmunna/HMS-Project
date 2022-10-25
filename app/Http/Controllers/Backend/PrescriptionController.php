<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Eatingtime;
use App\Models\Frequency;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionDetails;
use App\Models\Quantity;
use App\Models\QuantityType;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }


    public function patient_info($id)
    {
        $patient = Patient::with('blood')->findOrfail($id);
        return response()->json($patient);
    }

    public function medicine_info($id)
    {   
        $medicin = Medicine::findOrfail($id);
        $quantities = Quantity::all();
        $qtytypies  = QuantityType::all();
        $eatingTimes = Eatingtime::all();
        $frequencies = Frequency::all(); 

        return response()->json(['medicine' => $medicin, 'frequencies' => $frequencies, 'quantities'=> $quantities,'qtytypies'=> $qtytypies,'eatingTimes'=> $eatingTimes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();
        $medicines = Medicine::all();
        return view('backend.prescription.create',compact('patients','medicines'));
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
            'patient_id'    => 'required',
            'medicine_id'   => 'required',
            'frequency'     => 'required',
            'qty'           => 'required',
            'qtyType'       => 'required',
            'eatingType'    => 'required',
        ]);


         //medicine_id inputs string to number array create
        $stringSplit = str_split($request->medicine_id);
        $removeComas =  str_replace(',', '', $stringSplit);
        $stringToNumber = array_map(function($removeComas) {
            return intval($removeComas);
        },$removeComas);
        $medicine_id = array_diff($stringToNumber, array(0));
        //medicine_id inputs string to number array create

        
         //frequency inputs string to number array create
        $removeComas =  str_replace(',', '', $request->frequency);
        $frequency_id = array_map(function($removeComas) {
            return intval($removeComas);
        },$removeComas);
        //frequency inputs string to number array create

        //Qty inputs string to number array create
        $removeComas =  str_replace(',', '', $request->qty);
        $qty_id = array_map(function($removeComas) {
            return intval($removeComas);
        },$removeComas);
        //Qty inputs string to number array create

        //QtyType inputs string to number array create
        $removeComas =  str_replace(',', '', $request->qtyType);
        $qtyType_id = array_map(function($removeComas) {
            return intval($removeComas);
        },$removeComas);
        //QtyType inputs string to number array create

        //eatingTime inputs string to number array create
        $removeComas =  str_replace(',', '', $request->eatingType);
        $eatingTime_id = array_map(function($removeComas) {
            return intval($removeComas);
        },$removeComas);
        //eatingTime inputs string to number array create

       $prescription =  Prescription::create([
            'medicine_id'       => $medicine_id,
            'frequency_id'      => $frequency_id,
            'quantity_id'       => $qty_id,
            'quantity_type_id'  => $qtyType_id,
            'eatingtime_id'     => $eatingTime_id
        ]);


        PrescriptionDetails::create([
            'prescription_id' => $request->prescription->id,
            'patient_id' => $request->patient_id
        ]);

        
        notify()->success('Prescription Created');
        return redirect()->route('app.prescription.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
