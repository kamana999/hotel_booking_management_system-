<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'description', 'available', 'status', 'room_type'];
    
    public function room_type()
    {
        return $this->belongsTo('App\Models\RoomCategory');
    }

    public function room_bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

}
