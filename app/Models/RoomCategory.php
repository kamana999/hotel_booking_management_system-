<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type');
    }
    
    public function getDiscountedPrice()
    {
        return $this->cost_per_day - (($this->cost_per_day/100) * $this->discount_percentage);
    }
}
