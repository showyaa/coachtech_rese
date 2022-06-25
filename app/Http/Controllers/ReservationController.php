<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function create(ReservationRequest $request)
    {
        $request['datetime'] = $request['start_date'].''.$request['start_time'];

        $form = $request->all();

        if($request->user_id == Auth::user()->id)
        {

        Reservation::create($form);

        return view('done');

        } else {

            return redirect('/');
            
        }
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
