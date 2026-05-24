<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = ['name', 'housetype_id', 'description','featured_image','gallery_images'];

    public function housetype()
    {
        return $this->belongsTo(Housetype::class);
    }
}
