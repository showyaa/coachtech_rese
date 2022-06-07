<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'num_of_users',
        'start_at',
    ];

    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }
}
