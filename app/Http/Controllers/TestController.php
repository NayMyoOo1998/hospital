<?php

namespace App\Http\Controllers;

use App\Test;
use App\Patient;
use Illuminate\Http\Request;

class TestController extends Controller
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
            'test_name' => 'required',
            'ref_num' => 'required',
            'recieve_date' => 'required',
            'report_date' => 'required',
            'test_result'=>'required',
        ]);
        //     echo "<pre>";
        // print_r($request->all());

        Test::create([
            'test_name' => $request->test_name,
            'patient_name' =>$request->patient_name,
            'lab_name' => $request->lab_name,
            'ref_num' => $request->ref_num,
            'srd' => $request->recieve_date,
            'rd' => $request->report_date,
            'doctor_name' => $request->doctor_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'test_result'=> $request->test_result,

        ]);

       return redirect('report');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function addTest($id)
    {
        $patient = Patient::find($id);
        return view('add-test',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
