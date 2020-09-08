@extends('layouts.master')
@section('title', 'labs-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Enter Test Details</h1>
        <hr>
        <div class="labs-list border">
            <form action="{{url('add-test')}}" method="post" class="pl-3 pr-3 pt-3 pb-3">
                @csrf
                <div class="form-group">
                    <label for="test-name">Test Name</label>
                    <input type="text" name="test_name" id="test-name" class="form-control @error('test_name') is-invalid @enderror">
                    @error('test_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="patient-name">Patient Name</label>
                    <input type="text" name="patient_name" id="patient-name" class="form-control" value="{{$patient->name}}" >
                </div>
                <div class="form-group">
                    <label for="lab-name">Lab Name</label>
                    <input type="text" name="lab_name" id="lab-name" class="form-control" value="{{$patient->lab_name}}" >
                </div>
                <div class="form-group">
                    <label for="ref_num">Ref Number</label>
                    <input type="text" name="ref_num" id="ref_num" class="form-control @error('ref_num') is-invalid @enderror">
                    @error('ref_num')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="recive-date">Sample Recived Date</label>
                    <input type="date" name="recieve_date" id="recive-date" class="form-control @error('recieve_date') is-invalid @enderror">
                    @error('recieve_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="report-date">Reported Date</label>
                    <input type="Date" name="report_date" id="report-date" class="form-control @error('report_date') is-invalid @enderror">
                     @error('report_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="doctor-name">Doctor Name</label>
                    <input type="text" name="doctor_name" id="doctor-name" class="form-control" value="{{$patient->doctor_name}}" >
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" class="form-control" value="{{$patient->age}}" >
                </div>
                <div class="form-group">
                    <p><b class="text-dark">Sex</b></p>
                    <input type="radio" name="gender" id="" class="" {{ $patient->gender == 'male' ? 'checked' : '' }} value="Male">&nbsp;<span>Male</span>
                    <input type="radio" name="gender" id="" class="" {{ $patient->gender == 'female' ? 'checked' : '' }}  value = "female">&nbsp;<span>Female</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{$patient->email}}" >
                </div>
                <div class="form-group">
                    <label for="test-result">Test Result</label>
                    <textarea name="test_result" id="test-result" cols="30" rows="5" class="form-control @error('test_result') is-invalid @enderror"></textarea>
                     @error('test_result')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-info">Add</button>
                <a href="{{url('patients-list')}}" class="btn btn-outline-danger">Cancel</a>
            </form>

        </div>
    </div>
</div>
@endsection