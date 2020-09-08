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