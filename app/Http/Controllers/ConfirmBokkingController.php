<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class ConfirmBokkingController extends Controller
{
    public function index(){
        $data['bookings'] = Booking::all(); 
        return view('admin.booking', $data);
    }

    public function edit($id){
        $data['booking'] = Booking::findOrFail($id);
        return view('admin.editbooking', $data);
    }

    public function update(Request $request ,$id){
        $book = Booking::findOrFail($id);
        $room = Room::findOrFail($book->room_id);
        $request->validate([
            'status'=>'required',
            'payment'=>'required',
        ]);
        $book->status = $request->status;
        $book->payment = $request->payment;
        $book->save();
        if ($request->status == 'checked_in') {
            $room->available = 0;
            $room->save();
        } elseif($request->status == 'checked_out'){
            $room->available = 1;
            $room->save();
        }
        return redirect()->route('booking');
    }
    
}
