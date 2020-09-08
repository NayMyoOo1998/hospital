@extends('layouts.master')
@section('title', 'Test-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Test</h1>
        <hr>web page microsoft word
        <div class="labs-list border">
            <div class="labs-header row pt-2 pb-0">
                <div class="col-md-2">
                    <p class="pl-2">Tests list</p>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <a href="{{url('add-tests')}}" class="btn btn-info"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add</a>
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
                                <th scope="col">Test Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Madical</td>
                                <td>
                                    <a href="#" class="btn btn-outline-info">Edit</a>
                                    <a href="#" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection