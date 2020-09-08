@extends('layouts.master')
@section('title', 'Add Patients')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Add Patients</h1>
        <hr>
        <div class="labs-list border">
            <div class="labs-header pt-2 pl-3">
                <h6>Enter Patients</h6>
            </div>
            <hr>
            <p class="text-success pl-3">{{ $status ?? " " }}</p>
            <form action="" method="post" class="pl-3 pr-3 w-50 pb-3">
                @csrf
                <div class="form-group">
                    <label for="doc_name">Doctor Name</label>
                    <input type="text" name="doctor_name" id="doc_name" class="form-control @error('doctor_name') is-invalid @enderror ">
                    @error('doctor_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Patient Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror ">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="labs">Select Labs</label>
                    <select name="labs" id="labs" class="form-control">
                        @foreach($labs as $lab)
                        <option value="{{$lab->name}}">{{$lab->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pass-code">Pass Code</label>
                    <input type="text" name="passcode" id="pass-code" class="form-control @error('passcode') is-invalid @enderror">
                    @error('passcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror">
                    @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <p><b class="text-dark">Sex</b></p>
                    <input type="radio" name="gender" id="" class="" value="male">&nbsp;<span>Male</span>
                    <input type="radio" name="gender" id="" class="" value="female">&nbsp;<span>Female</span>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-info">Add</button>
                <a href="{{url('patients-list')}}" class="btn btn-outline-danger">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection