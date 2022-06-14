<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_info',
        'res_info',
        'song_info',
        'order_id',
        'delivery_info'
    ];

    protected $casts = [
        'food_info' => 'array',
        'res_info' => 'array',
        'song_info' => 'array'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
