<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'space_image',
        'res_price',
        'description'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
