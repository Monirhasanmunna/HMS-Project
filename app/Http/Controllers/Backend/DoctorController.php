<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.doctor.index');
        $doctors = Doctor::orderBy('id','DESC')->get();
        return view('backend.doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.doctor.create');
        return view('backend.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.doctor.create');
       $request->validate([
        'name'                  => 'required|string',
        'email'                 => 'required|email|unique:doctors',
        'degrees'               => 'required|string',
        'specialist'            => 'required',
        'consultant_of_college' => 'sometimes',
        'mobile'                => 'required|min:11',
       ]);

       Doctor::create([
        'name'                  => $request->name,
        'email'                 => $request->email,
        'mobile'                => $request->mobile,
        'degrees'               => $request->degrees,
        'specialist'            => $request->specialist,
        'designation'            => $request->designation,
        'consultant_of_college' => $request->consultant_of_college,
        'firstVisit'            => $request->firstVisit,
        'nextVisit'            => $request->nextVisit,
        'reportOnly'            => $request->reportOnly
       ]);

       notify()->success('Doctor Create Successfully');
       return redirect()->route('app.doctor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::findOrfail($id);
        return response()->json($doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('app.doctor.edit');
        $doctor = Doctor::findOrfail($id);
        return view('backend.doctor.create',compact('doctor'));
        
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
        Gate::authorize('app.doctor.edit');
        $request->validate([
            'name'                  => 'required|string',
            'email'                 => 'required|email',
            'degrees'               => 'required|string',
            'specialist'            => 'required',
            'consultant_of_college' => 'sometimes',
            'mobile'                => 'required|min:11',
           ]);
    
           Doctor::findOrfail($id)->update([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'degrees'               => $request->degrees,
            'specialist'            => $request->specialist,
            'designation'            => $request->designation,
            'consultant_of_college' => $request->consultant_of_college,
            'mobile'                => $request->mobile,
            'firstVisit'            => $request->firstVisit,
            'nextVisit'            => $request->nextVisit,
            'reportOnly'            => $request->reportOnly
           ]);
    
           notify()->success('Doctor Update Successfully');
           return redirect()->route('app.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('app.doctor.destroy');
        $doctor = Doctor::findOrfail($id);
        $doctor->delete();
        return response()->json($doctor);
    }
}
