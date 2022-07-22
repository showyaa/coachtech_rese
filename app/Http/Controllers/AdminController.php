<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\Reservation;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $areas = Area::all();
        $genres = Genre::all();
        $shop = Shop::where('user_id', $admin->id)->first();

        $param = [
            'admin' => $admin,
            'areas' => $areas,
            'genres' => $genres,
            'shop' => $shop,
        ];

        return view('admin', $param);
    }

    public function reservation()
    {
        $admin = Auth::user();
        $shops2 = Shop::where('user_id', $admin->id)->with('reservations')->get();
        $reservation = Reservation::orderBy('start_at', 'asc')->with('shop')->get();
        $reservations = $reservation->where('shop.user_id', $admin->id)->sortBy('shop.id');
        

        $param = [
            'admin' => $admin,
            'reservations' => $reservations,
            'shops2' => $shops2,
        ];


        return view('reservation', $param);
    }

    public function upsert(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        $admin = Auth::user();
        Shop::updateOrCreate(['id' => $request->id], ['user_id' => $admin->id, 'name' => $request->name, 'area_id' => $request->area_id, 'genre_id' => $request->genre_id, 'description' => $request->description, 'image_url' => $request->image_url]);
        return back();
    }

    public function create(Request $request)
    {
        $admin = Auth::user();
        Shop::create(['user_id' => $admin->id, 'name' => $request->name, 'area_id' => $request->area_id, 'genre_id' => $request->genre_id, 'description' => $request->description, 'image_url' => $request->image_url]);

        return back();
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Shop::where('id', $request->id)->update($form);
        return back();
    }
    
}
