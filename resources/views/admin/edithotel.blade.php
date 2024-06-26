@extends('admin.adminbase')

@section('content')
<div class="row">
    <div class="col-lg-6">
        <table class="table">
            <tr>
                <th>name</th>
                <th>address</th>
                <th>contact</th>
                <th>zip</th>
                <th>actipn</th>
            </tr>
            @foreach ($hotels as $cat)
                <tr>
                    <td>{{$cat->name}}</td>
                    <td>{{$cat->address}}</td>
                    <td>{{$cat->contact}}</td>
                    <td>{{$cat->zip}}</td>
                    
                    <td>
                        <form  class="d-inline" action="{{route('hotels.destroy',['hotel'=>$cat->id])}}" method="POST">
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-danger btn-xs" id="delete" value="Delete" hidden>
                        </form>
                        <button onclick="getElementById('delete').click()" class=" btn btn-transparent text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                          </svg></button>
                         
                        <a href="{{route('hotels.show',['hotel'=>$cat->id])}}" class="text-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                          </svg></a>
                        <a href="{{route('hotels.edit',['hotel'=>$cat->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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
            <form action="{{route('hotels.update', $edits->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">name</label>
                    <input type="text" name="name"   value="{{$edits->name}}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="">address</label>
                    <input type="text" name="address" class="form-control"  value="{{$edits->address}}">
                </div>
                <div class="mb-3">
                    <label for="">address2</label>
                    <input type="text" name="address2" class="form-control"  value="{{$edits->address2}}">
                </div>
                <div class="mb-3">
                    <label for="">zipcode</label>
                    <input type="text" name="zipcode" class="form-control"  value="{{$edits->zipcode}}">
                </div>
                <div class="mb-3">
                    <label for="">contact</label>
                    <input type="text" name="contact" class="form-control"  value="{{$edits->contact}}">
                </div>
                <div class="mb-3">
                    <label for="">city</label>
                    <input type="text" name="city" class="form-control"  value="{{$edits->city}}">
                </div>
                <div class="mb-3">
                    <label for="">File</label>
                    @if ($edits->image)
                        <img src="{{url('upload/'.$edits->image)}}" alt="" srcset="" height="70" width="70">
                    @endif
                    <input type="file" name="image" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="state"></label>
                    <input type="text" name="state" class="form-control" value="{{$edits->state}}">
                </div>
                <div class="mb-3">
                    <label for="">about</label>
                    <textarea name="about" id="" cols="30" rows="10" class="form-control">{{$edits->about}}</textarea>
                </div>
                
                <div class="mb-3">
                    <input type="submit" class="btn btn-dark w-100">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection