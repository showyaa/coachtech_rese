<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Review;
use PhpParser\Node\Expr\FuncCall;

class ReviewController extends Controller
{
    public function review()
    {
        $review_lists = Reservation::where('user_id', auth()->user()->id)->where('start_at', '<=', date('Y-m-d-H-i'))->orderBy('id', 'desc')->get();


        $param = [
            'review_lists' => $review_lists,
        ];

        return view('review', $param);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        Review::create($form);

        return view('reviewed');
    }
}
