<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'user_id',
        'description',
        'image_url',
    ];

    public function reservations()
    {
        $limit_time = date('Y-m-d H:i', strtotime('-1 hour'));
        return $this->hasMany('App\Models\Reservation')->orderBy('start_at', 'asc')->where('start_at', '>=', $limit_time);
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function area() {
        return $this->belongsTo('App\Models\Area');
    }

    public function genre() {
        return $this->belongsTo('App\Models\Genre');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }


    public function is_liked_by_auth_user()
    {
        $id = Auth::id();

        $likers = array();
        
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if(in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
