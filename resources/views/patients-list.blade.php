@extends('layouts.master')
@section('title', 'Patients-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Patients</h1>
        <hr>
        <div class="labs-list border">
            <div class="labs-header row pt-2">
                <div class="col-md-2">
                    <p class="pl-2">Patients List</p>
                </div>
                <div class="col-md-8"></div>
                @if(Auth::user()->role == 'doctor')
                <div class="col-md-2">
                    <a href="{{url('add-patients')}}" class="btn btn-info"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add</a>
                </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <form action="" class="pl-1">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" id="patientSearch">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Go</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <div class="row pr-2">
                        <div class="col-md-5"></div>
                        <div class="col-md-3"><span>Order By :</span></div>
                        <div class="col-md-4 mb-2">
                            <select name="patientorder" id="patientorder" class="w-100">
                                <option value="firstadd">First Add</option>
                                <option value="name">name</option>
                                <option value="lastadd">Last Add</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-4">
                            <select name="" id="" class="w-100">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover text-center w-100">
                        <thead>
                            <tr>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Lab Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Passcode</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="patient-tbody">
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->doctor_name}}</td>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->lab_name}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->passcode}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info dropdown-toggle pr-5" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuButton">
                                            @if(Auth::user()->role == 'lab')
                                            <a class="dropdown-item w-25" href="{{url('add-test/'. $patient->id)}}">Add Tests</a>
                                            @else
                                            <a class="dropdown-item w-25" href="#" onclick="PatientsEdit({{$patient}})" data-toggle="modal" data-target="#editmodal">Edit</a>
                                            <a class="dropdown-item w-25" href="{{url('patient-delete/'. $patient->id)}}">Delete</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade " id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                    <div class="modal-content border border-info rounded">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Lab Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="editForm">
                                @csrf
                                <div class="form-group">
                                    <label for="doc_name">Doctor Name</label>
                                    <input type="text" name="doctor_name" id="doc_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="patient_name">Patient Name</label>
                                    <input type="text" name="patient_name" id="patient_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="lab">Lab Name</label>
                                    <input type="text" name="lab_name" id="lab_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Passcode</label>
                                    <input type="text" name="passcode" id="passcode" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="age">Age</label>
                                    <input type="number" name="age" id="age" class="form-control">
                                </div>
                                <div class="form-group">
                                    <p><b class="text-dark">Sex</b></p>
                                    <input type="radio" name="gender" id="gender" class="" value="male">&nbsp;<span>Male</span>
                                    <input type="radio" name="gender" id="gender" class="" value="female">&nbsp;<span>Female</span>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    function PatientsEdit(patient) {
        document.getElementById('doc_name').value = patient.doctor_name;
        document.getElementById('patient_name').value = patient.name;
        document.getElementById('lab_name').value = patient.lab_name;
        document.getElementById('passcode').value = patient.passcode;
        document.getElementById('phone').value = patient.phone;
        document.getElementById('age').value = patient.age;
        var radio = document.getElementById('gender').value;

    }
</script>