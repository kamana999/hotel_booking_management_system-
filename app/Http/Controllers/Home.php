<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\RoomCategory;
use App\Models\Booked;
use App\Models\User;
use App\Models\Coustomer;
use App\Rules\RoomAvailableRule;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use Auth;

use Illuminate\Http\Request;

class Home extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function index(Request $r){
        if(User::where([['id',Auth::id()], ['superuser', TRUE]])->exists()){
            return redirect()->route('categorydashboard');   
        }
        $data = ['room_type' => RoomCategory::all(),];
        return view('public.home',$data);
    } 

    public function room_type(Request $req,$id){
        $data = [
            'room_type' => RoomCategory::find($id),
        ];
        return view('public.room_type',$data);   
    } 

    public function booking(Request $request,$type_id){
        $room_type = RoomCategory::findOrFail($type_id);
        $room = Room::where([['room_type',$type_id], ['available',1]])->first();
        $new_arrival_date = $request->input('arrival_date');
        $new_departure_date = $request->input('departure_date');
        $request->validate([
            'arrival_date'=>'required',
            'departure_date'=>'required',
        ]);
        $user =  Auth::id();
        $room_booking = new Booking();
        $room_booking->arrival_date = $request->arrival_date;
        $room_booking->departure_date = $request->departure_date;
        $startTime = Carbon::parse($room_booking->arrival_date);
        $finishTime = Carbon::parse($room_booking->departure_date);
        $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1; 
        $room_booking->room_cost = $no_of_days * $room_type->cost_per_day;
        $room_booking->user_id = Auth::id();

        $room_booking->room_id = $room->id;
        $room_booking->status = 'pending';
        $room_booking->payment = FALSE;
        $room_booking->save();
       
        return redirect()->back()->with('message', 'Your Room is Booked ');
        
    }

}
