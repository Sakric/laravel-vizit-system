<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Models\Category;
use App\Models\Doctors;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        'user' => Auth::user()
    ]);
});
Route::get('/doctors', function () {
    return view('doctors',[
        'categories' => Category::all(),
        'doctors' => Doctors::all(),
    ]);
});

Route::get('/doctors/{doctor}', function (Doctors $doctor) {
    return view('doctor-page',[
        'doctor' => $doctor,
        'reservations' => Reservation::all()
    ]);
});
Route::get('/dashboard/users', function () {
    return view('dashboard.users',[
        'users' => User::all(),
        'roles' => Role::all()
    ]);
});
Route::get('/dashboard/doctors', function () {
    return view('dashboard.doctors',[
        'doctors' => Doctors::all(),
        'categories' => Category::all()
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/dashboard/users/edit/{user}', [AdminController::class, 'update']);
Route::post('/dashboard/users/new', [AdminController::class, 'store']);

Route::post('/dashboard/doctors/new', [AdminController::class, 'storeDoctor']);
Route::post('/dashboard/doctors/create', [AdminController::class, 'createDoctor']);
Route::post('/dashboard/doctors/edit/{doctor}', [AdminController::class, 'updateDoctor']);
Route::delete('/dashboard/doctors/delete/{doctor}', [AdminController::class, 'deleteDoctor']);
Route::get('/dashboard/services', [ServiceController::class, 'open']);


Route::get('/dashboard/doctors/edit/{doctor}', function (Doctors $doctor){
    return view('dashboard.doctors-edit', [
        'doctor' => $doctor,
        'categories' => Category::all()
    ]);
});

Route::get('/dashboard/categories', function (){
    return view('dashboard.categories', [
        'categories' => Category::all()
    ]);
});

Route::get('/dashboard/doctors/vouchers/{doctor}', [AdminController::class, 'openVouchers']);
Route::post('/dashboard/categories/new', [CategoriesController::class, 'store']);
Route::post('/dashboard/categories/edit/{category}', [CategoriesController::class, 'update']);
Route::delete('/dashboard/categories/delete/{category}', [CategoriesController::class, 'delete']);

Route::post('/dashboard/doctors/reservation/create/{doctor}', [AdminController::class, 'createReservations']);
Route::post('/dashboard/doctors/voucher/new', [VoucherController::class, 'createVoucher']);
Route::get('/doctors/reservation/set/{doctor}/{reservation}', [ReservationController::class, 'createVizit'])->middleware(['auth']);
Route::post('/doctors/reservation/set/{doctor}/{reservation}', [ReservationController::class, 'confirmVizit'])->middleware(['auth']);

///doctors/rezervation/1
// Services routes
Route::post('/dashboard/services/new', [ServiceController::class, 'store']);
Route::post('/dashboard/services/edit/{service}', [ServiceController::class, 'update']);
Route::delete('/dashboard/services/delete/{service}', [ServiceController::class, 'delete']);
Route::post('/dashboard/doctors/services/{doctor}', [ServiceController::class, 'updateDoctor']);

Route::get('/dashboard/doctors/services/{doctor}', function (Doctors $doctor){
    return view('dashboard.doctors-services', [
        'doctor' => $doctor,
        'services' => Service::all()
    ]);
});

// User routes
Route::post('/profile/update', [UserController::class, 'update']);
Route::post('/profile/update/password', [UserController::class, 'updatePassword']);
Route::get('/profile', function (){
    return view('user-profile',[
        'user' => Auth::user(),
        'reservations' => Reservation::where('user_id', '=', Auth::user()->id)->latest()->get()
    ]);
});

Route::get('/profile/{reservation}', function (Reservation $reservation){
    return view('user-reservation',[
        'reservation' => $reservation
    ]);
});

Route::get('/visit', function (){
    return view('user-visits',[
        'user' => Auth::user()
    ]);
});

// Doctor

Route::get('/doctor', function (){
    return view('doctor-dashboard',[
        'user' => Auth::user(),
        'reservations' => Reservation::where('user_id', '=', Auth::user()->id)->latest()->get()
    ]);
});

Route::get('/doctor/reservation-{reservation}-doctor{doctor}', [DoctorController::class, 'openReservation']);


Route::get('/doctor-search/{query}', [DoctorController::class, 'autocompleteSearch']);
Route::get('/user-search/{query}', [UserController::class, 'autocompleteSearch']);










Route::delete('dashboard/users/delete/{user}', [AdminController::class, 'delete']);
Route::get('/autocomplete-search/{query}', [TypeaheadController::class, 'autocompleteSearch']);
Route::get('/doctors-reservation/{query}', [ReservationController::class, 'list']);

require __DIR__.'/auth.php';
