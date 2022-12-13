<?php

namespace App\Http\Controllers;

use App\Models\Doctors;
use App\Models\Service;

class ServiceController extends Controller
{
    public function open()
    {
        return view('dashboard.services', [
            'services' => Service::all(),
        ]);

    }

    public function store(Service $service)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        $service->create($attributes);
        return redirect('/dashboard/services');
    }

    public function update(Service $service)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $service->update($attributes);
        return redirect('/dashboard/services');
    }

    public function delete(Service $service)
    {
        $service->delete();
        return redirect('/dashboard/services');
    }
    public function updateDoctor(Doctors $doctor)
    {
//        dd($doctor->id);
//        dd(\request()->except('_token'));

//        dd(\DB::table('service_doctor')->where('doctor_id', '=', $doctor->id)->get());
        $values = array();
        foreach(\request()->except('_token') as $value){
            $values[] = $value;
            if (\DB::table('service_doctor')->where('doctor_id', '=', $doctor->id)
                ->where('service_id', '=', $value)->exists()) continue;
            $service = array();
            $service['doctor_id'] = $doctor->id;
            $service['service_id'] = $value;
            \DB::table('service_doctor')->insert($service);
        }

        foreach(\DB::table('service_doctor')->where('doctor_id', '=', $doctor->id)->get() as $value){
            if (!in_array($value->service_id, $values)){
                \DB::table('service_doctor')->where('id', '=', $value->id)->delete();
            }
        }


        return redirect('/dashboard/doctors');

    }


}
