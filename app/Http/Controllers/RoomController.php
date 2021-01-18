<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomController extends Controller
{
   
    public function index()
    {
        $data['category'] = RoomCategory::all();
        $data['rooms'] = Room::all();
        return view('admin.room', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_number'=>'required',
            'room_type'=>'required',
            'description'=>'required',
            'available'=>'required',
            'status'=>'required',
        ]);

        $room = new Room();
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->description = $request->description;
        $room->available = $request->available;
        $room->status = $request->status;
        $room->save();
        return redirect()->route('rooms.index');
    }

    public function show(Room $room)
    {
        $data['ro'] = $room;
        $data['rooms'] = Room::all();
        return view('admin.showroom', $data);
    }

    public function edit(Room $room)
    {
        $data['edits'] = $room;
        $data['category'] = RoomCategory::all();
        $data['rooms'] = Room::all();
        return view('admin.editroom', $data);
    
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number'=>'required',
            'room_type'=>'required',
            'description'=>'required',
            'available'=>'required',
            'status'=>'required',
        ]);

        $room = $room;
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->description = $request->description;
        $room->available = $request->available;
        $room->status = $request->status;
        $room->save();
        return redirect()->route('rooms.index');   
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back();
    }
}
