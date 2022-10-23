<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Assistant;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assistants = Assistant::orderBy('id','DESC')->get();
        return view('backend.assistant.index',compact('assistants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        return view('backend.assistant.create',compact('doctors'));
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
            'doctor'    => 'required',
            'name'      => 'required|string',
            'email'     => 'required|email|unique:assistants',
            'degrees'   => 'required',
            'mobile'    => 'required|min:11'
        ]);

        Assistant::create([
            'doctor_id' => $request->doctor,
            'name'      => $request->name,
            'email'     => $request->email,
            'degrees'   => $request->degrees,
            'mobile'    => $request->mobile
        ]);

        notify()->success('Assistant Create Successfully');
        return redirect()->route('app.assistant.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assistant = Assistant::with('doctor')->findOrfail($id);
        return response()->json($assistant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctors = Doctor::all();
        $assistant = Assistant::findOrfail($id);
        return view('backend.assistant.create',compact('doctors','assistant'));
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
            'doctor'    => 'required',
            'name'      => 'required|string',
            'email'     => 'required|email',
            'degrees'   => 'required',
            'mobile'    => 'required|min:11'
        ]);

        Assistant::findOrfail($id)->update([
            'doctor_id' => $request->doctor,
            'name'      => $request->name,
            'email'     => $request->email,
            'degrees'   => $request->degrees,
            'mobile'    => $request->mobile
        ]);

        notify()->success('Assistant Update Successfully');
        return redirect()->route('app.assistant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assistant = Assistant::findOrfail($id);
        $assistant->delete();
        return response()->json($assistant);
    }
}
