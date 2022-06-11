<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $form = $request->all();
        Reservation::create($form);

        return back();
    }

    public function delete()
    {

    }

    public function done()
    {
        return view('done');
    }
}
