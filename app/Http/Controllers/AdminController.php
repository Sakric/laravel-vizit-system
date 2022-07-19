<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Doctors;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use function Illuminate\Support\Facades\Request;

class AdminController extends Controller
{
    public function store(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'password' => 'required'
        ]);
        $attributes['password'] = Hash::make($attributes['password']);
        $user->create($attributes);
        return redirect('/dashboard/users');


    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'role_id' => 'required'
        ]);

        $user->update($attributes);
        return redirect('/dashboard/users');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect('/dashboard/users');
    }

    public function storeDoctor(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        return view('dashboard.doctors-new', [
            'user' => $user,
            'categories' => Category::all()
        ]);
    }

    public function createDoctor()
    {
        $attributes = request()->validate([
            'user_id' => ['required', Rule::exists('users', 'id')],
            'thumbnail' => 'required|image',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('doctors');

        $user = User::where('id', $attributes['user_id'])->first();

        $user->update([
            'role_id' => 2
        ]);

        Doctors::create($attributes);

        return redirect('/dashboard/doctors');
    }


    public function updateDoctor(Doctors $doctor)
    {
        $attributes = request()->validate([
            'thumbnail' => 'image',
            'category_id' => 'required',
//            'specialization' => 'required',
//            'education' => 'required',
            'body' => 'required',
        ]);
        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('doctors');
        }

        $doctor->update($attributes);


        return redirect('/dashboard/doctors');
    }

    public function deleteDoctor(Doctors $doctor)
    {
        User::where('id', $doctor->user->id)->update(['role_id' => 1]);
        $doctor->delete();
        return redirect('/dashboard/doctors');
    }

    public function openVouchers(Doctors $doctor)
    {
        return view('dashboard.vouchers',[
            'doctor' => $doctor,
            'vouchers' =>  Voucher::where('doctor_id', $doctor->id)->get()
        ]);
    }

    public function createReservations(Doctors $doctor){
        setlocale(LC_ALL, 'lt_lt.UTF-8');
        $day = array();
        $day_2 = array();
        for ($i = 0; $i <= 23; $i++) {
            $value = strftime("%Y-%m-%d %H-%M-%S", mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
            $value_2 = ucfirst(strftime("%A", mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"))));
//            $value_day = ucfirst(substr($value, 0, 3));
//            $value_date = substr($value, -5  );
            $day[] = $value;
            $day_2[] = $value_2;
        }

        $filterResult = Voucher::where('doctor_id', $doctor->id)->get()->toArray();

        $days = array();

        foreach($filterResult as $day){
            foreach($day_2 as $key=>$diena){
              if($day['day'] == $diena){
                  $days[] = strftime("%Y-%m-%d %H-%M-%S", mktime(substr($day['time'], 0, 2), substr($day['time'], 3, 2), 0, date("m")  , date("d")+$key, date("Y")));
              }
            };
        };

        $final = array();
        foreach($days as $date){
            if (Reservation::where('date', '=', $date)->exists()) continue;
            $rezervation = array();
            $rezervation['doctor_id'] = $doctor->id;
            $rezervation['user_id'] = null;
            $rezervation['service'] = null;
            $rezervation['date'] = $date;

            Reservation::create($rezervation);
            $final[] = $rezervation;

        }
        return $final;

    }

}
