@foreach($labs as $lab)
<tr>
    <td>{{$lab->name}}</td>
    <td>{{$lab->phone}}</td>
    <td>{{$lab->passcode}}</td>
    @if(Auth::user()->role == 'lab')
    <td>
        <a href="#" class="btn btn-outline-info" data-toggle="modal" data-target="#editmodal" onclick="Edit({{ $lab }})">Edit</a>
        <a href="{{url('lab-delete/'.$lab->id)}}" class="btn btn-outline-danger">Delete</a>
    </td>
    @endif
</tr>

@endforeach