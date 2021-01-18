@extends('admin.adminbase')

@section('content')
<div class="col-lg-10">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>room_number</th>
            <th>cost</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Action</th>
        </tr>
        @foreach ($bookings as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->room->room_number}}</td>
                <td>{{$item->room_cost}}</td>
                <td>
                    @if($item->status == "pending")
                        <button class="btn btn-success btn-xs btn-fill">Pending</button>
                    @elseif($item->status == "checked_in")
                        <button class="btn btn-info btn-xs btn-fill">Checked In
                        </button>
                    @elseif($item->status == "checked_out")
                        <button class="btn btn-primary btn-xs btn-fill">Checked Out
                        </button>
                    @elseif($item->status == "cancelled")
                        <button class="btn btn-danger btn-xs btn-fill">Cancelled
                        </button>
                    @endif
                </td>
                <td>
                    @if($item->payment == 1)
                        <button class="btn btn-success btn-xs btn-fill">Paid</button>
                    @else
                        <button class="btn btn-default btn-xs btn-fill">Not Paid</button>
                    @endif
                </td>

                <td>
                    <form  class="d-inline" action="" method="POST">
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-danger btn-xs" id="delete" value="Delete" hidden>
                    </form>
                    <a href="{{route('edit',['id'=>$item->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                    <button onclick="getElementById('delete').click()" class=" btn btn-transparent text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg></button>
                    
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection