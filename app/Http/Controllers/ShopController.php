<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Like;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;

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
            'input_name' => '',
            'input_area' => '',
            'input_genre' => '',
        ];

        return view('index', $param);
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $shops = Shop::where('name', 'LIKE', "%{$request->name}%")->where('area_id', 'LIKE', "%{$request->area}%")->where('genre_id', 'LIKE', "%{$request->genre}%")->get();
        $areas = Area::all();
        $genres = Genre::all();
        $input_area = $request->area;
        $input_genre = $request->genre;

        $param = [
            'user' => $user,
            'shops' => $shops,
            'areas' => $areas,
            'genres' => $genres,
            'input_name' => $request->name,
            'input_area' => $input_area,
            'input_genre' => $input_genre,
        ];

        return view('index', $param);
    }
    
    public function detail(Shop $shop, Request $request)
    {
        $user = Auth::user();
        $tommorow = date('Y-m-d', strtotime('+1 day'));
        $limit = date('Y-m-d', strtotime('+90 day'));
        $count_users = range(1, 10);
        $input_num = $request->num_of_users;
        $reservations = Reservation::where('shop_id', $shop->id)->get();

        $param = [
            'user' => $user,
            'tommorow' => $tommorow,
            'limit' => $limit,
            'shop' => $shop,
            'count_users' => $count_users,
            'input_num' => $input_num,
            'reservations' => $reservations,
        ];

        return view('detail', $param);
    }
}
