<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lab;
use App\Patient;
use App\Test;

class PageController extends Controller
{
   
    public function index(){
        return view('index');
    }

    public function labList(){
        $labs=Lab::all();
        return view('labs-list',compact('labs'));
    }

    public function addLabs(){
        return view('add-labs');
    }

    public function patientsList(){
        $patients = Patient::all();
        return view('patients-list', compact('patients'));
    }

    

    public function addPatients(){
        $labs = Lab::all();
        return view('add-patients', compact('labs'));
    }

    public function report(){
        $tests = Test::all();
        return view('report', compact('tests'));
    }

    public function reportView($id){
        $test = Test::find($id);
        // echo "<pre>";
        // print_r($tests);
        
        return view('report-view', compact('test'));
    }

    public function testList(){
        return view('test-list');
    }

    public function notallowforlab(){
        return "You are not doctor. Only doctor can do this feature  <a href='/'> BACK </a>";
    }

    public function notallowfordoctor(){
        return "You are not a Lab. Only Lab can do this feature " . "<a href='/'> BACk </a>";
    }
}
