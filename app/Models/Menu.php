<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'price',
      'description',
      'image'
    ];

    public function food_categories()
    {
        return $this->belongsToMany(FoodCategory::class, 'food_category_menu');
    }
}
