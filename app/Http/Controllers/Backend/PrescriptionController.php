<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advice;
use App\Models\Doctor;
use App\Models\Eatingtime;
use App\Models\Frequency;
use App\Models\MedicalTest;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\PrescriptionAdvice;
use App\Models\PrescriptionDetails;
use App\Models\PrescriptionMedicine;
use App\Models\PrescriptionTest;
use App\Models\Quantity;
use App\Models\QuantityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PrescriptionController extends Controller
{

    public function dashboard()
    {
        Gate::authorize('app.prescriptiondashboard.dashboard');
        return view('backend.prescription.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.prescription.index');
        $prescriptions=Prescription::all();
        return view('backend.prescription.index', compact('prescriptions'));
    }

    public function view(Request $request, Prescription $prescription){
        // dd($prescription->patient);
        return view('backend.prescription.view', compact('prescription'));
    }

    public function patient_info($id)
    {
        $patient = Patient::findOrfail($id);
        return response()->json($patient);
    }

    public function medicine_info($id)
    {
        $medicin = Medicine::findOrfail($id);
        $quantities = Quantity::all();
        $qtytypies  = QuantityType::all();
        $eatingTimes = Eatingtime::all();
        $frequencies = Frequency::all();

        return response()->json(['medicine' => $medicin, 'frequencies' => $frequencies, 'quantities' => $quantities, 'qtytypies' => $qtytypies, 'eatingTimes' => $eatingTimes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.prescription.create');
        $patients = Patient::all();
        $medicines = Medicine::all();
        $medicalTest = MedicalTest::where('status', 1)->get();
        $advice = Advice::all();
        $doctors = Doctor::all();
        return view('backend.prescription.create', compact('patients', 'medicines', 'medicalTest', 'advice', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.prescription.create');
        // dd($request->all());
        $request->validate([
            'patient_id'    => 'required',
            'medicine_id'   => 'required',
            'doctor_id'     => 'required',  
            'cc'            => 'required'          
        ]);


        $prescription =  Prescription::create([
            "mem_type" => $request->mem_type,
            "education" => $request->education,
            "sbp" => $request->sbp,
            "dbp" => $request->dbp,
            "oxygen" => $request->oxygen,
            "pulse" => $request->pulse,
            "temp" => $request->temp,
            "edima" => $request->edima,
            "anemia" => $request->anemia,
            "jaundice" => $request->jaundice,
            "weight" => $request->weight,
            "height" => $request->height,
            "bmi" => $request->bmi,
            "blgr" => $request->blgr,
            "heart" => $request->heart,
            "lungs" => $request->lungs,
            "diabeties" => $request->diabeties,
            "hp" => $request->hp,
            "ihd" => $request->ihd,
            "strk" => $request->strk,
            "copd" => $request->copd,
            "cancer" => $request->cancer,
            "ckd" => $request->ckd,
            "salt" => $request->salt,
            "smoke" => $request->smoke,
            "smoking" => $request->smoking,
            "cc" => $request->cc,
            "diagnosis" => $request->diagnosis,
            "sec_diagnosis" => $request->sec_diagnosis,
            "sec_dx2" => $request->sec_dx2,
            "next_meet" => $request->next_meet,
            "meet_day" => $request->meet_day,
            "patient_id" => $request->patient_id,
            "doctor_id" => $request->doctor_id
        ]);


        // dd($prescription->id);
        $medId=explode(',', $request->medicine_id);
        foreach($request->frequency as $key=>$freq){
            PrescriptionMedicine::create([
               'frequency_id' =>$freq,
                'qty_id'=>$request->qty[$key],
                'qtyType_id'=>$request->qtyType[$key],
                'eatingType_id'=>$request->eatingType[$key],
                'eatDuration'=>$request->eatDuration[$key],
                'medicine_id'=>$medId[$key],
                'prescription_id'=>$prescription->id
            ]);
        }
        
        if($request->advice){

            foreach($request->advice as $key=>$adv){
                PrescriptionAdvice::create([
                   'advice_id' =>$adv,                
                    'prescription_id'=>$prescription->id
                ]);
            }
        }
        
        if($request->suggest_test){

            foreach($request->suggest_test as $key=>$test){
                PrescriptionTest::create([
                   'medical_test_id' =>$test,                
                    'prescription_id'=>$prescription->id
                ]);
            }
        }
        


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
        Gate::authorize('app.prescription.edit');
        $patients = Patient::all();
        $medicines = Medicine::all();
        $medicalTest = MedicalTest::where('status', 1)->get();
        $advice = Advice::all();
        $doctors = Doctor::all();
        $prescription=Prescription::findOrfail($id);
        return view('backend.prescription.create', compact('patients', 'medicines', 'medicalTest', 'advice', 'doctors', 'prescription'));
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
        Gate::authorize('app.prescription.destroy');
        $prescription = Prescription::findOrfail($id);
        $prescriptionMedicine=PrescriptionMedicine::where('prescription_id', $id)->get();
        $prescriptionMedicine->each->delete();
        $prescriptionAdvice=PrescriptionAdvice::where('prescription_id', $id)->get();
        $prescriptionAdvice->each->delete();
        $prescriptionTest=PrescriptionTest::where('prescription_id', $id)->get();
        $prescriptionTest->each->delete();
        $prescription->delete();
        return response()->json($prescription);
    }
}
