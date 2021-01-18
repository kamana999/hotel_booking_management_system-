@extends('admin.adminbase')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <table class="table">
                <tr>
                    <th>Room_number</th>
                    <th>Type</th>
                    <th>Avaiabllity</th>
                    <th>Action</th>
                </tr>
                @foreach ($rooms as $cat)
                    <tr>
                        <td>{{$cat->room_number}}</td>
                        <td>{{$cat->room_type}}</td>
                        @if ($cat->available == 1)<td>Avaiable</td> @else<td>Unavaiable</td>@endif
                        <td>
                            <a href="{{route('rooms.destroy',['room'=>$cat->id])}}" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg>
                              
                            </a>
                            <a href="{{route('rooms.show',['room'=>$cat->id])}}" class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                              </svg></a>
                            <a href="{{route('rooms.edit',['room'=>$cat->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                              </svg></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col-lg-6">
            <div class="card card-body">
                <form action="{{route('rooms.update', $edits->id)}}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">room_number</label>
                        <input type="text" name="room_number" class="form-control" value="{{$edits->room_number}}">
                    </div>
                    <div class="mb-3">
                        <label for="">room_type</label>
                        <select name="room_type" id="" class="form-control" value="{{$edits->room_type}}">
                            @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$edits->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1"@if (Request::old('status') == '1') selected="selected" @endif>Active</option>
                            <option value="0"@if (Request::old('status') == '0') selected="selected" @endif>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">available</label>
                        <select name="available" id="available" class="form-control">
                            <option value="1"@if (Request::old('available') == '1') selected="selected" @endif>Avaiable</option>
                            <option value="0"@if (Request::old('available') == '0') selected="selected" @endif>Unavaiable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-dark w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection