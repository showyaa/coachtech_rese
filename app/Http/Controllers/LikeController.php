<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        $form = $request->all();
        Like::create($form);
        
        return back();
    }

    public function delete(Request $request)
    {
        Like::where('shop_id', $request->shop_id,)->where('user_id', auth()->user()->id)->delete();

        return back();
    }
}
