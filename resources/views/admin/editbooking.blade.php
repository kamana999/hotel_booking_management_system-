@extends('admin.adminbase')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <form action="{{route('update',$booking->id)}}" method="POST">
                    @csrf @method('put')
                    <div class="mb-4">
                        <label for="">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending"@if ($booking->status == 'pending') selected="selected" @endif>Pending</option>
                            <option value="checked_in"@if ($booking->status == 'checked_in') selected="selected" @endif>Checked_in</option>
                            <option value="checked_out"@if ($booking->status == 'checked_out') selected="selected" @endif>Checked_out</option>
                            <option value="cancelled"@if ($booking->status == 'cancelled') selected="selected" @endif>Cancelled</option>    
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="">Payment</label>
                        <select name="payment" id="payment" class="form-control">
                            <option value="1"@if (Request::old('status') == '1') selected="selected" @endif>Paid</option>
                            <option value="0"@if (Request::old('status') == '0') selected="selected" @endif>Not Paid</option>
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