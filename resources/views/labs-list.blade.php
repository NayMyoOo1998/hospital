@extends('layouts.master')
@section('title', 'labs-list')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h1">Labs</h1>
        <hr>
        <div class="labs-list border">
            <div class="labs-header row pt-2 pb-0">
                <div class="col-md-2">
                    <p class="pl-2">Labs list</p>
                </div>
                <div class="col-md-8"></div>
                @if(Auth::user()->role == 'lab')
                <div class="col-md-2">
                    <a href="{{url('add-labs')}}" class="btn btn-info"><i class="fa fa-plus-square pr-1" aria-hidden="true"></i>Add</a>
                </div>
                @endif
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <form action="" class="pl-1">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" id="labs-list">
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
                        <div class="col-md-3 text-right"><span>Order By :</span></div>
                        <div class="col-md-4 mb-2 text-left">
                            <select name="laborder" id="laborder" class="w-100">
                                <option value="firstadd">First Add</option>
                                <option value="name">Name</option>
                                <option value="lastadd">Last Add</option>
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
                                <th scope="col">Labs Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Lab passcode</th>
                                @if(Auth::user()->role == 'lab')
                                <th scope="col">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="labs-list-tbody">
                            @foreach($labs as $lab)
                            <tr>
                                <td>{{$lab->name}}</td>
                                <td><span>+95</span>{{$lab->phone}}</td>
                                <td>{{$lab->passcode}}</td>
                                @if(Auth::user()->role == 'lab')
                                <td>
                                    <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#editmodal" onclick="Edit({{ $lab }})">Edit</a>
                                    <a href="{{url('lab-delete/'.$lab->id)}}" class="btn btn-outline-danger">Delete</a>
                                </td>
                                @endif
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
                                    <label for="name">Lab Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Lab Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="passcode">Passcode</label>
                                    <input type="text" name="passcode" id="passcode" class="form-control">
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
    function Edit(lab) {
        document.getElementById('name').value = lab.name;
        document.getElementById('phone').value = lab.phone;
        document.getElementById('passcode').value = lab.passcode;


        let form = document.getElementById('editForm');
        form.action = '/labupdate/' + lab.id;
    }
</script>