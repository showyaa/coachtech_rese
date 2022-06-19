<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Area;
use App\Models\Genre;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::all();
        $areas = Area::all();
        $genres = Genre::all();
        $param = [
            'user' => $user,
            'shops' => $shops,
            'shop_name' => '',
            'areas' => $areas,
            'genres' => $genres,
        ];

        return view('index', $param);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")->where('area_id', 'LIKE', "%{$request->area}%")->where('genre_id', 'LIKE', "%{$request->genre}%")->get();
        $areas = Area::all();
        $genres = Genre::all();
        $param = [
            'user' => $user,
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genres,
        ];

        return view('index', $param);
    }
    
    public function detail(Shop $shop)
    {
        $user = Auth::user();
        $tommorow = date('Y-m-d', strtotime('+1 day'));
        $limit = date('Y-m-d', strtotime('+90 day'));
        $param = [
            'user' => $user,
            'tommorow' => $tommorow,
            'limit' => $limit,
            'shop' => $shop,
        ];

        return view('detail', $param);
    }
}
