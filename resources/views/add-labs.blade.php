@extends('layouts.master')
@section('title', 'labs-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Add Labs</h1>
        <hr>
        <div class="labs-list border">
            <div class="labs-header pt-2">
                <h5 class="pl-3">Enter Labs Datails</h5>
            </div>
            <hr>
            <p class="text-success pl-3">{{ $status ?? " " }}</p>
            <form action="{{url('add-labs')}}" method="post" class="pl-3 pr-3 pb-2">
                @csrf
                <div class="form-group">
                    <label for="lab-name">Lab Name</label>
                    <input type="text" name="lab_name" id="lab-name" class="form-control @error('lab_name') is-invalid @enderror">
                    @error('lab_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Lab Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lab-passcode">Lab Passcode</label>
                    <input type="text" name="lab_passcode" id="lab-passcode" class="form-control @error('lab_passcode') is-invalid @enderror">
                    @error('lab_passcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-info">Add</button>
                <a href="{{url('labs-list')}}" class="btn btn-outline-danger">Cancel</a>
            </form>

        </div>
    </div>
</div>
@endsection