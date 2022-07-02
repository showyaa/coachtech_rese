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

    public function review() {
        return $this->hasOne('App\Models\Review');
    }


    public function shop() {
        return $this->belongsTo('App\Models\Shop');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

}
