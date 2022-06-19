<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $request['datetime'] = $request['start_date'].''.$request['start_time'];
        $form = $request->all();
        Reservation::create($form);

        return view('done');
    }

    public function delete(Request $request)
    {
        Reservation::find($request->id)->delete();

        return redirect('/mypage');
    }

    public function done()
    {
        return view('done');
    }
}
