@extends('layouts.master')
@section('title', 'Home')

@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-title mb-0 bg-info">
                        <i class="fa fa-users float-left mt-4 ml-4 h1" aria-hidden="true"></i>
                        <div class="float-right">
                            <h2 class="mt-2 pl-5">3</h2>
                            <strong class="pr-3"> Patients</strong>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <hr>
                    <a href="#" class="pl-2 pb-3 text-info"> <b>view datails</b> <strong class="ml-5 pl-5"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        </strong></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-title mb-0 bg-success">
                        <i class="fa fa-calendar float-left mt-4 ml-4 h1" aria-hidden="true"></i>
                        <div class="float-right">
                            <h2 class="mt-2 pl-4">9</h2>
                            <strong class="pr-3"> Reports</strong>
                        </div>
                        <div class="clear-fix"></div>
                    </div>
                    <hr>
                    <a href="#" class="pl-2 pb-3 text-success"> <b>view datails</b> <strong class="ml-5 pl-5"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        </strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection