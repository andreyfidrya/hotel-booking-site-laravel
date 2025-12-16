<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name'];

    public function housetypes()
    {
        return $this->belongsToMany(
            Housetype::class,
            'facility_housetype'
        );
    }
}

