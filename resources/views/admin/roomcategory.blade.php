@extends('admin.adminbase')
@section('content')
<a href="{{route('roomcategory.create')}}" class="btn btn-info  text-white">Add New Category</a>

    <table class="table mt-3">
        <thead class="bg-secondary text-light">
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>CPD</th>
                <th>Services</th>
                <th>Status</th>
                <th>Discount</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($category as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->cost_per_day}}</td>
                @if ($cat->room_service == 1)<td>Avaiable</td> @else<td>Unavaiable</td>@endif
                @if ($cat->status == 1)<td>Active</td> @else<td>Inactive</td>@endif
                <td>{{$cat->discount_percentage}}%</td>
                <td>
                    <form  class="d-inline" action="{{route('roomcategory.destroy',['roomcategory'=>$cat->id])}}" method="POST">
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                    <a href="{{route('roomcategory.edit',['roomcategory'=>$cat->id])}}" class="btn btn-info">edit</a>
                    <a href="{{route('roomcategory.show',['roomcategory'=>$cat->id])}}" class="btn btn-xs btn-primary">view</a>
                    
                </td>
            </tr>
        @endforeach
    </table>
@endsection