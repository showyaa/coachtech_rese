<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class MyPageController extends Controller
{
    public function mypage()
    {
        $likes = Like::where('user_id', auth()->user()->id)->get();

        $param = [
            'likes' => $likes
        ];

        return view('mypage', $param);
    }
}
