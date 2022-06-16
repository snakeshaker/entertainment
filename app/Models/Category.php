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
        'description',
        'limit'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function getTableNum()
    {
        $total = 0;

        foreach ($this->tables as $table) {
            $total += 1;
        }
        return $total;
    }
}
