<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function mypage(Request $request)
    {
        $likes = Like::where('user_id', auth()->user()->id)->get();
        $tommorow = date('Y-m-d', strtotime('+1 day'));
        $limit = date('Y-m-d', strtotime('+90 day'));
        $reserved = Reservation::where('user_id', auth()->user()->id)->where('start_at', '>=', date('Y-m-d'))->get();
        $user = Auth::user();
        $input_num = $request->num_of_users;
        $count_users = range(1, 10);


        $param = [
            'likes' => $likes,
            'reserved' => $reserved,
            'user' => $user,
            'input_num' => $input_num,
            'count_users' => $count_users,
            'tommorow' => $tommorow,
            'limit' => $limit,
        ];

        return view('mypage', $param);
    }
}
