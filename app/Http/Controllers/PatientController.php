<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use App\Lab;

class PatientController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'passcode' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'doctor_name' => 'required',
        ]);
       Patient::create([
           'doctor_name' => $request->doctor_name,
            'name'=>$request->name,
            'lab_name' => $request->labs,
            'passcode' => $request->passcode,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
       ]);

       $labs = Lab::all();



       return view('add-patients',compact('labs'))->with('status', 'Successfully Add patient');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('patients-list');
    }

    public function search(Request $request){
      $patients = Patient::where('name', 'LIKE', '%'.$request->name.'%')->get();
        return view('patient.patientsearch',compact('patients'));
    }

    public function patientEmpty(){
        $patients = Patient::all();
        return view('patient.patients-empty-list',compact('patients'));
    }

    public function patientOrder(Request $request){
       if($request->name == 'name'){
           $patients = Patient::orderBy('name', 'ASC')->get();
           return view('patient.patient-list-order', compact('patients'));
       }elseif($request->name == 'firstadd'){
        $patients = Patient::orderBy('id', 'ASC')->get();
        return view('patient.patient-list-order', compact('patients'));
       }else{
        $patients = Patient::orderBy('id', 'DESC')->get();
        return view('patient.patient-list-order', compact('patients'));
       }
    }
}
