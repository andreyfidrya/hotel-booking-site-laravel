<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'house_id',
        'coupon_id',
        'arrival_date',
        'departure_date',
        'adults',
        'children',
        'pets',
        'name',
        'phone',
        'email',
        'price',
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
