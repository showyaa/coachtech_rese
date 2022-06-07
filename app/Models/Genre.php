<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fiilable = [
        'genre',
    ];

    public function shops()
    {
        $this->hasMany('App\Models\Shop');
    }
}
