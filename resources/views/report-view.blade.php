@extends('layouts.master')
@section('title', 'labs-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h2">Reports for <b>{{$test->patient_name}}</b></h1>
        <hr>
        <div class="labs-list border">
            <div class="labs-header row pt-2">
                <div class="col-md-2">
                    <p class="pl-2">Patients List</p>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <a href="#" class="btn btn-info"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add</a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <form action="" class="pl-1">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3"><span>Order By :</span></div>
                        <div class="col-md-4 mb-2">
                            <select name="" id="" class="w-100">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="" id="" class="w-100">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">View</th>
                                <th scope="col">Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$test->patient_name}}</td>
                                <td>{{$test->test_name}}</td>
                                <td>{{$test->rd}}</td>
                                <td><a href="#" class="text-info">View</a></td>
                                <td><a href="" class="text-info">Download</a></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection