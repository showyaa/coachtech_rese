<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        $form = $request->all();
        
        if($request->user_id == Auth::user()->id)
        {
        Like::create($form);
        
        return back();

        } else {

            return redirect('/');

        }
    }

    public function delete(Request $request)
    {
        Like::where('shop_id', $request->shop_id,)->where('user_id', auth()->user()->id)->delete();

        return back();
    }
}
