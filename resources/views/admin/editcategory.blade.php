@extends('admin.adminbase')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="{{route('roomcategory.update', $category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$category->description}} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">cost_per_day</label>
                        <input type="number" name="cost_per_day" class="form-control" value="{{ $category->cost_per_day }}">
                    </div>
                    <div class="mb-3">
                        <label>Discount</label>
                        <input type="text" name="discount_percentage"  class="form-control" id="discount_percentage" value="{{ $category->discount_percentage  }}">
                    </div>
                    <div class="mb-3">
                        <label for="">max_adult</label>
                        <input type="number" name="max_adult" class="form-control" value="{{ $category->max_adult }}">
                    </div>
                    <div class="mb-3">
                        <label for="">max_child</label>
                        <input type="number" name="max_child" class="form-control" value="{{ $category->max_child }}">
                    </div>

                    <div class="mb-3">
                        <label for="">Services</label>
                        <select name="room_service" id="room_service" class="form-control">
                            <option value="1"@if (Request::old('room_service') == '1') selected="selected" @endif>Avaiable</option>
                            <option value="0"@if (Request::old('room_service') == '0') selected="selected" @endif>Unavaiable</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1"@if (Request::old('room_service') == '1') selected="selected" @endif>Active</option>
                            <option value="0"@if (Request::old('room_service') == '0') selected="selected" @endif>Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">No_of_beds</label>
                        <input type="number" name="no_of_bed" class="form-control" value="{{ $category->no_of_bed }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="">File</label>
                        @if ($category->image)
                            <img src="{{url('upload/'.$category->image)}}" alt="" srcset="" height="70" width="70">
                        @endif
                        <input type="file" name="image" id="" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-dark w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection     