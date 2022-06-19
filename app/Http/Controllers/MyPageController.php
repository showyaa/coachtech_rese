<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function mypage()
    {
        $likes = Like::where('user_id', auth()->user()->id)->get();
        $reserved = Reservation::where('user_id', auth()->user()->id)->get();
        $user = Auth::user();

        $param = [
            'likes' => $likes,
            'reserved' => $reserved,
            'user' => $user,
        ];

        return view('mypage', $param);
    }
}
