<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function update()
    {

        $user = Auth::user();
        $attributes = request()->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'lastname' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required',
        ],
            [
                'email.required' => 'Paštą privaloma įvesti.',
                'email.unique' => 'Toks paštas jau užimtas',
                'name.min' => 'Vardas turi būti bent jau iš 3 raidžių',
                'lastname.min' => 'Pavardė turi būti bent jau iš 3 raidžių',
            ]);

        $user->update($attributes);

        return redirect('/profile');
    }

    public function updatePassword(){
        $user = Auth::user();
        $attributes = request()->validate([
            'oldPassword' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
            [
                'password.confirmed' => 'Slaptažodis turi sutapti',
                'password.min' => 'Slaptažodis turi buti bent jau iš 8 symbolių',

            ]);
        $password = Hash::make($attributes['password']);

        $credentials = [
            'email' => $user->email,
            'password' => $attributes['oldPassword']
        ];
        if (Auth::attempt($credentials)) {
            $user->update([
                'password' => $password
            ]);
        }

        return redirect('/profile');
    }

    public function autocompleteSearch($query)
    {
        $filterResult = User::query()
            ->where('id', "{$query}")->get();
        return response()->json($filterResult);
    }

    public function getAll()
    {
        return view('dashboard.users', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }

    public function openProfile()
    {
        return view('user-profile', [
            'user' => Auth::user(),
            'reservations' => Reservation::where('user_id', '=', Auth::user()->id)->latest()->get()
        ]);
    }
    public function openProfileReservation(Reservation $reservation)
    {
        return view('user-reservation', [
            'reservation' => $reservation
        ]);
    }
}


