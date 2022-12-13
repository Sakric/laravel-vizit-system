<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Doctors;
use App\Models\Medicine;
use App\Models\Medicine_User;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function autocompleteSearch($query)
    {
        $doctor = Doctors::query()->where('user_id', "{$query}")->first();
        $filterResult = Reservation::query()
            ->where('doctor_id', $doctor->id)->where('user_id', '!=', null)->get();

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
            'reservation' => $reservation,
            'medicines' => Medicine::all()
        ]);
    }

    public function prescribe(Reservation $reservation, User $user)
    {
        $attributes = request()->validate([
            'medicine_id' => 'required',
        ]);

        if (\DB::table('medicine_user')->where('user_id', '=', $user->id)
            ->where('medicine_id', '=', $attributes['medicine_id'])->exists()){
            session()->flash('message', 'Pacientas jau turi tokį išrašytą vaistą');
        } else{
            $medicine = array();
            $medicine['user_id'] = $user->id;
            $medicine['medicine_id'] = $attributes['medicine_id'];
            $medicine['created_at'] = new \DateTime();
            \DB::table('medicine_user')->insert($medicine);
            session()->flash('message', 'Sėkmingai išrašytas vaistas pacientui');
        }


        return redirect(url()->previous());
    }
    public function unPrescribe($id)
    {

            \DB::table('medicine_user')->delete($id);
            session()->flash('message', 'Sėkmingai ištrintas vaistas pacientui');

        return redirect(url()->previous());
    }

    public function newMedicine(Medicine $medicine)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $medicine->create($attributes);

        session()->flash('message', 'Sėkmingai sukurtas vaistas ( ' . $attributes['name'] . ' )');


        return redirect('/doctor');

    }
    public function updateMedicine(Medicine $medicine)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $medicine->update($attributes);

        session()->flash('message', 'Sėkmingai atnaujintas vaistas ( ' . $attributes['name'] . ' )');


        return redirect('/doctor');

    }

    public function deleteMedicine(Medicine $medicine)
    {
        $medicine->delete();

        session()->flash('message', 'Sėkmingai ištrintas vaistas');


        return redirect('/doctor');

    }

    public function openEditDoctor(Doctors $doctor)
    {
        return view('dashboard.doctors-edit', [
            'doctor' => $doctor,
            'categories' => Category::all()
        ]);
    }

    public function viewDoctors()
    {
        return view('doctors', [
            'categories' => Category::all(),
            'doctors' => Doctors::all(),
        ]);
    }

    public function viewDoctor(Doctors $doctor)
    {
        return view('doctor-page', [
            'doctor' => $doctor,
            'reservations' => Reservation::all()
        ]);
    }
    public function viewAdminDoctors()
    {
        return view('dashboard.doctors', [
            'doctors' => Doctors::all(),
            'categories' => Category::all()
        ]);
    }

    public function openDoctorServices(Doctors $doctor)
    {
        return view('dashboard.doctors-services', [
            'doctor' => $doctor,
            'services' => Service::all()
        ]);
    }
    public function openDoctorDashboard()
    {
        return view('doctor-dashboard', [
            'user' => Auth::user(),
            'reservations' => Reservation::where('user_id', '=', Auth::user()->id)->latest()->get(),
            'medicines' => Medicine::all()
        ]);
    }


}
