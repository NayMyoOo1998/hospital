<?php

namespace App\Http\Controllers;

use App\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
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
            'lab_name' => 'required',
            'phone' => 'required',
            'lab_passcode' => 'required',
        ]);

        Lab::create([
            'name' => $request->lab_name,
            'phone' => $request->phone,
            'passcode' => $request->lab_passcode,
        ]);

        return view('add-labs')->with('status', "Successfully Add labs list");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'passcode' => 'required',
        ]);

        $labs = Lab::find($id);
        $labs->name = $request->name;
        $labs->phone = $request->phone;
        $labs->passcode = $request->passcode;
        $labs->save();
        return redirect('labs-list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $labs = Lab::find($id);
        $labs->delete();
        return redirect('labs-list');
    }



    public function search(Request $request)
    {
        $labs = Lab::where('name', 'LIKE', '%' . $request->name . '%')->get();
        // echo $labs;
        return view('labs-list-search', compact('labs'));
    }

    public function searchEmpty()
    {
        $labs = Lab::all();
        return view('labs-list-searchempty', compact('labs'));
    }

    public function labOrder(Request $request)
    {
        if ($request->name == 'firstadd') {
            $labs = Lab::orderBy('id', 'ASC')->get();
            return view('labs-list-order', compact('labs'));
        } elseif ($request->name == 'name') {
            $labs = Lab::orderBy('name', 'ASC')->get();
            return view('labs-list-order', compact('labs'));
        } else {
            $labs = Lab::orderBy('id', 'DESC')->get();
            return view('labs-list-order', compact('labs'));
        }
    }
}
