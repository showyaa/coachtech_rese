<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\User;

class ManageController extends Controller
{
    public function index(Shop $shop)
    {
        $areas = Area::all();
        $genres = Genre::all();
        $admins = User::where('role' , '<=' , '3')->get();
        
        $param = [
            'shop' => $shop,
            'areas' => $areas,
            'genres' => $genres,
            'admins' => $admins,
        ];

        return view('edit', $param);
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Shop::where('id', $request->id)->update($form);
        return back();
    }

    public function create_view()
    {
        $areas = Area::all();
        $genres = Genre::all();
        $admins = User::where('role' , '<=' , '3')->get();
        
        $param = [
            'areas' => $areas,
            'genres' => $genres,
            'admins' => $admins,
        ];

        return view('create', $param);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        Shop::create($form);

        return back();
    }
}
