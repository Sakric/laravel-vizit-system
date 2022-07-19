<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ReservationController extends Controller
{
    public function list($query)
    {
//        $query = $request->get('query');
        $filterResult = Reservation::query()
            ->where('doctor_id', 'LIKE', $query)->get();
        return response()->json($filterResult);

    }

    public function createVizit(Request $request)
    {
//        $attributes = request()->validate([
//            'rez' => 'required',
//        ]);
//
//        $rezervation = Reservation::where('id', $attributes['rez'])->first();
//        $rezervation->update([
//            'user_id' => Auth::user()->id,
//        ]);
        return view('doctor-reservation',[
            'reservation' =>  Reservation::where('id', 1)->first(),
            'user' => Auth::user(),
        ]);



//        return redirect('/dashboard/doctors');

    }
}
