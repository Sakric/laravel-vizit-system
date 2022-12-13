<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'lastname' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
            [
                'email.required' => 'Paštą privaloma įvesti.',
                'email.unique' => 'Toks paštas jau užimtas',
                'name.min' => 'Vardas turi būti bent jau iš 3 raidžių',
                'lastname.min' => 'Pavardė turi būti bent jau iš 3 raidžių',
                'password.confirmed' => 'Slaptažodis turi sutapti',
                'password.min' => 'Slaptažodis turi buti bent jau iš 8 symbolių',

            ]);
        $user = User::create([
            'name' => ucfirst($request->name),
            'lastname' => ucfirst($request->lastname),
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
