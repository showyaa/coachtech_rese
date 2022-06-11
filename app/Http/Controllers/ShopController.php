<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $param = [
            'user' => $user,
            'shops' => $shops,
        ];

        return view('index', $param);
    }
    
    public function detail(Shop $shop)
    {
        $user = Auth::user();
        $param = [
            'user' => $user,
            'shop' => $shop,
        ];

        return view('detail', $param);
    }
}
