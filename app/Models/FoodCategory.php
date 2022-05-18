<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'food_category_menu');
    }
}
