<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['hotels'] = Hotel::all();
        return view('admin.hotel', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'about'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required',
            'image'=>'required',
            
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->about = $request->about;
        $hotel->address = $request->address;
        $hotel->address2 = $request->address2;
        $hotel->contact = $request->contact;
        $hotel->city = $request->city;
        $hotel->state = $request->state;
        $hotel->zipcode = $request->zipcode;
        $hotel->image = $filename;
        $hotel->save();

        return redirect()->route('hotels.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        $data['hotels'] = Hotel::all();
        $data['hotel'] = $hotel;
        return view('admin.showhotel', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        $data['hotels'] = Hotel::all();
        $data['edits'] = $hotel;
        return view('admin.edithotel', $data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name'=>'required',
            'about'=>'required',
            'address'=>'required',
            'contact'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required',
            'image'=>'required',
            
        ]);

        $filename = time(). "." . $request->image->extension();
        $request->image->move(public_path("upload"), $filename);
        $hotel = $hotel;
        $hotel->name = $request->name;
        $hotel->about = $request->about;
        $hotel->address = $request->address;
        $hotel->address2 = $request->address2;
        $hotel->contact = $request->contact;
        $hotel->city = $request->city;
        $hotel->state = $request->state;
        $hotel->zipcode = $request->zipcode;
        $hotel->image = $filename;
        $hotel->save();

        return redirect()->route('hotels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index');

    }
}
