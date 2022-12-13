<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoucherController;
use App\Models\Category;
use App\Models\Doctors;
use App\Models\Medicine;
use App\Models\Messages;
use App\Models\Pages;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use App\Models\Voucher;
use http\Message;
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

Route::get('/dashboard/pages', [PageController::class, 'open']);
Route::get('/news', [PageController::class, 'openNews']);
Route::get('/dashboard/pages/new', [PageController::class, 'openCreate']);
Route::post('/dashboard/pages/create', [PageController::class, 'createPage']);
Route::post('/dashboard/pages/update/{page}', [PageController::class, 'updatePage']);
Route::delete('/dashboard/pages/delete/{page}', [PageController::class, 'deletePage']);
Route::get('/dashboard/post/edit/{page}', [PageController::class, 'editPage']);

Route::get('/', function () {

    return view('welcome', [
        'user' => Auth::user(),
        'pages' => Pages::latest()->take(4)->get()
    ]);
});

Route::get('/post/{page}', [PageController::class, 'openPage']);



Route::get('/kontaktai', [MessageController::class, 'open']);
Route::post('/kontaktai-send', [MessageController::class, 'store']);
Route::get('/messages/render/read/{message}', [MessageController::class, 'read']);
Route::delete('/dashboard/messages/delete/{message}', [MessageController::class, 'delete']);

Route::get('/doctors',[DoctorController::class, 'viewDoctors']);

Route::get('/doctors/{doctor}', [DoctorController::class, 'viewDoctor']);

Route::get('/dashboard/users', [UserController::class, 'getAll']);
Route::get('/dashboard/doctors', [DoctorController::class, 'viewAdminDoctors']);

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

Route::get('/dashboard/messages', [MessageController::class, 'openMessages']);


Route::get('/dashboard/doctors/edit/{doctor}', [DoctorController::class, 'openEditDoctor']);

Route::get('/dashboard/categories', [CategoriesController::class, 'open']);

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
Route::get('/dashboard/doctors/reservations/{doctor}', [ReservationController::class, 'openDoctorReservations']);
Route::post('/dashboard/doctor/reservation/reset/{reservation}', [ReservationController::class, 'resetReservation']);
Route::post('/dashboard/doctor/reservation/delete/{reservation}', [ReservationController::class, 'deleteReservation']);


Route::get('/dashboard/doctors/services/{doctor}', [DoctorController::class, 'openDoctorServices']) ;

// User routes
Route::post('/profile/update', [UserController::class, 'update']);
Route::post('/profile/update/password', [UserController::class, 'updatePassword']);
Route::get('/profile', [UserController::class, 'openProfile']);

Route::get('/profile/{reservation}', [UserController::class, 'openProfileReservation']);



// Doctor

Route::get('/doctor', [DoctorController::class, 'openDoctorDashboard']);

Route::get('/doctor/reservation-{reservation}-doctor{doctor}', [DoctorController::class, 'openReservation']);
Route::post('/doctor/medicine/prescribe/{reservation}/{user}', [DoctorController::class, 'prescribe']);
Route::delete('/doctor/delete/prescription/{id}', [DoctorController::class, 'unPrescribe']);
Route::post('/doctor/new/medicine', [DoctorController::class, 'newMedicine']);
Route::post('/doctor/update/medicine/{medicine}', [DoctorController::class, 'updateMedicine']);
Route::delete('/doctor/delete/medicine/{medicine}', [DoctorController::class, 'deleteMedicine']);




Route::get('/doctor-search/{query}', [DoctorController::class, 'autocompleteSearch']);
Route::get('/user-search/{query}', [UserController::class, 'autocompleteSearch']);


Route::delete('dashboard/users/delete/{user}', [AdminController::class, 'delete']);
Route::get('/autocomplete-search/{query}', [TypeaheadController::class, 'autocompleteSearch']);
Route::get('/doctors-reservation/{query}', [ReservationController::class, 'list']);

require __DIR__ . '/auth.php';
