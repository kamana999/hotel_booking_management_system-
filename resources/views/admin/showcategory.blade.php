@extends('admin.adminbase')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Image</th>
                    <td><img src="{{url('upload/'.$category->image)}}" alt="" height="100" width="100" srcset=""></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{$category->name}}</td>
                </tr>
                <tr>
                    <th>description</th>
                    <td>{{$category->description}}</td>
                </tr>
                <tr>
                    <th>cost_per_day</th>
                    <td>{{$category->cost_per_day}}</td>
                </tr>
                <tr>
                    <th>discount_percentage</th>
                    <td>{{$category->discount_percentage}}</td>
                </tr>
                <tr>
                    <th>room_service</th>
                    <td>{{$category->room_service}}</td>
                </tr>
                <tr>
                    <th>status</th>
                    <td>{{$category->status}}</td>
                </tr>
                
                <tr>
                    <th>max_adult</th>
                    <td>{{$category->max_adult}}</td>
                </tr>
                <tr>
                    <th>max_child</th>
                    <td>{{$category->max_child}}</td>
                </tr>
                <tr>
                    <th>no_of_bed</th>
                    <td>{{$category->no_of_bed}}</td>
                </tr>
            </table>
        </div>
    </div>
    
@endsection