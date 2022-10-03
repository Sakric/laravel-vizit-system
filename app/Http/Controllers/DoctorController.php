<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctors;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function autocompleteSearch($query)
    {
        $filterResult = Reservation::query()
            ->where('doctor_id', "{$query}")->where('user_id', '!=', null)->get();

        foreach ($filterResult as $key => $value) {
            if($value['user_id']) {
                $user = User::query()
                    ->where('id', $value['user_id'])->first();
                $filterResult[$key]->name = $user['name'];
                $filterResult[$key]->lastname = $user['lastname'];
            }
        }
        return response()->json($filterResult);
    }

    public function openReservation(Reservation $reservation, $doctor)
    {
        return view('doctor-dashboard-reservation',[
            'reservation' => $reservation
        ]);
    }


}
