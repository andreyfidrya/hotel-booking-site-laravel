<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'house_id',
        'user_id',        
        'arrival_date',
        'departure_date',
        'adults',
        'children',
        'pets',
        'coupon_id',
        'amount',
        'full_name',
        'phone',
        'email',        
        'status',
    ];


    public function house()
    {
        return $this->belongsTo(House::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
