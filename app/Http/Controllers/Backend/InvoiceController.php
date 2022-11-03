<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Prescription;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function generateInvoice($type,  $ref_id)
    {
        if($type==1){
            $pres=Prescription::where('id', $ref_id)->first();
            $doctor_id=$pres->doctor_id; 
            $patient_id=$pres->paitent_id;
        }
        
        
        return view('backend.invoice.create', compact('doctor_id', 'patient_id','ref_id','pres', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'amount'=> 'required'
        // ]);

        $invoice=Invoice::create([
            'doctor_id'=>$request->doctor_id,
            'patient_id'=>$request->patient_id,
            'ref_id'=>$request->ref_id,
            'doctor_id'=>$request->doctor_id,
            'doctor_id'=>$request->doctor_id,
            'invoice_date'=>date('Y-m-d'),
            'remark'=>$request->remark,
            'amount'=>$request->amount,
            'discount'=>$request->discount,
            'net_amount'=>($request->amount - $request->amount),
        ]);

        if($invoice){
            InvoiceDetail::create([
                'invoice_id'=>$invoice->id,
                'detail' => 'prescription',
                'unit_amount'=>$request->amount
            ]);

            $pres=Prescription::where('id', $request->ref_id)->first();
            $pres->status='complete';
            $pres->save();
        }

        notify()->success('Invoice Generated');
        return redirect()->route('app.prescription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        // dd($invoice);
        return view('backend.invoice.view', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
