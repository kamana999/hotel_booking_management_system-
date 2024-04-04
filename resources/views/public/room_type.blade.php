@extends('public.base')

@section('content')
    <div class="container-fluid">
        <div class="row">
           
            <div class="card bg-dark text-light ">
                <img src="{{asset($room_type->image)}}" alt="" height="500vh" width="100%">
                <div class="card-img-overlay" style="background: rgba(0, 0, 0, 0.5)"></div>
            </div>
            
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
            <div class="bg-dark p-3 text-light">
               <h4 class="ms-5">CHECK AVIAILABILTY</h4>
               <p class="text-secondary ms-5">Lorem ipsum dolor sit, quos fuga deleniti. Asperiores, itaque excepturi numquam laboriosam earum nisi impedit fugit vel deserunt molestias quod.</p>
                <form action="{{route('bookings',['room_id'=>$room_type->id])}}" class="ms-5 form mb-5" method="POST">
                    @csrf
                    <input type="text" value="{{$room_type->cost_per_day}}" name="room_cost" class="form-btn p-3" disabled style="color: black;font-weight:bold">
                    <select name="No of adults" class="form-btn p-3 ms-3">
                        <option value="" disabled selected>No. of adults</option>
                        @for($i = 1; $i <= $room_type->max_adult; $i++ )
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="No of adults" class="form-btn p-3 ms-3">
                        <option value="" disabled selected>No. of child</option>
                        @for($i = 0; $i <= $room_type->max_child; $i++ )
                            <option value="{{ $i }}" >{{ $i }}</option>
                        @endfor
                    </select>
                    <input class="  p-3 ms-3 form-btn" type="date" placeholder="Arival Date" name="arrival_date">
                    <input class="  p-3 ms-3 form-btn" type="date" placeholder="Dispatch Date" name="departure_date">
                    <input type="submit" class="btn btn-filled btn-danger p-3 ps-5 pe-5 ms-3 form-btn">
                
                </form>

            </div>
        </div>
    </div>    
@endsection