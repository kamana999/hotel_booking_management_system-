<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\RoomCategory;
use Illuminate\Http\Request;

class RoomCategoryController extends Controller
{
    public function index()
    {
        
        $data['category'] = RoomCategory::all();
        return view('admin.roomcategory', $data);
    }
    
    public function create()
    {
        return view('admin.insertcategory');   
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'cost_per_day' => 'required',
            'max_adult' => 'integer|min:1',
            'max_child' => 'numeric',
            'status' => 'required|boolean'
        ]);
        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $cat = new RoomCategory();
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->cost_per_day = $request->cost_per_day;
        $cat->max_adult = $request->max_adult;
        $cat->max_child = $request->max_child;
        $cat->status = $request->status;
        $cat->discount_percentage = $request->discount_percentage;
        $cat->room_service = $request->room_service;
        $cat->no_of_bed = $request->no_of_bed;
        $cat->image = $filename;
        $cat->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room_type has been updated successfully');
        return redirect()->route('roomcategory.index');

    }
    public function show(RoomCategory $roomcategory)
    {
        $data['category'] = $roomcategory;
        return view('admin.showcategory', $data);
    }

    public function edit(RoomCategory $roomcategory)
    {
        // $category['category'] = RoomCategory::find($id);
        // return view('admin.editcategory',$category);
        $room_type['category'] = $roomcategory;
        return view("admin.editcategory", $room_type);

    }

    public function update(Request $request, RoomCategory $roomcategory)
    {
        $request->validate([
            'name' => 'required',
            'cost_per_day' => 'required',
            'max_adult' => 'integer|min:1',
            'max_child' => 'numeric',
            'status' => 'required|boolean'
        ]);

        
        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $cat = $roomcategory;
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->cost_per_day = $request->cost_per_day;
        $cat->max_adult = $request->max_adult;
        $cat->max_child = $request->max_child;
        $cat->status = $request->status;
        $cat->discount_percentage = $request->discount_percentage;
        $cat->room_service = $request->room_service;
        $cat->no_of_bed = $request->no_of_bed;
        $cat->image = $filename;
        $cat->save();
        return redirect()->route('roomcategory.index');
    }

    public function destroy(RoomCategory $roomcategory)
    {
        $roomcategory->delete();
        return redirect()->back();
    }
}
