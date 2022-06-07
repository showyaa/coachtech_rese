<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $param = [
            'shops' => $shops,
        ];

        return view('index', $param);
    }
    
    public function detail(Shop $shop)
    {
        $param = [
            'shop' => $shop,
        ];

        return view('detail', $param);
    }
}
