<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housetype extends Model
{
    protected $fillable = ['name','description','capacity','area','price_per_extra_person','price_on_business_days','price_on_weekends'];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function houses()
    {
        return $this->hasMany(House::class);
    }
}
