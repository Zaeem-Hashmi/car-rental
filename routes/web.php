<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('home', [
//         'title' => 'Cabs Online | Book A Taxi Ride With Us Today!']);
// });

// Route::get('/about', function () {
//     return view('about', [
//         'title' => 'About | Cabs Online']);
// });

// Route::resource('/booking', PassengerController::class);
// Route::match(['get', 'post'], '/continue-booking', [PassengerController::class, 'continueBooking']);

// Route::get('/cancel-booking', [PassengerController::class, 'cancelBooking']);

// Route::get('/register', [RegisterController::class, 'index'])
//     ->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store']);

// Route::get('/login', [LoginController::class, 'index'])
//     ->name('login')
//     ->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);

// Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/admin', function () {
//     return view('admin.index', [
//         'title' => 'Dashboard Admin | Cabs Online',
//     ]);
// })->middleware('auth');

// Route::post('/admin/assign', [DriverController::class, 'assign'])
//     ->middleware('auth');

// Route::match(['get', 'post'], '/admin/assign-button', [DriverController::class, 'assignBtn'])
//     ->middleware('auth');

// Route::match(['get', 'post'], '/admin/search-button', [DriverController::class, 'searchBtn'])
//     ->middleware('auth');

// Route::get('/admin/all', [DriverController::class, 'showAll'])
//     ->middleware('auth');

// Route::get('/admin/recent', [DriverController::class, 'showRecent'])
//     ->middleware('auth');

// Route::get('/admin/avail', [DriverController::class, 'showAvail'])
//     ->middleware('auth');


Route::view('/','client.home',['title' => 'Cabs Online | Book A Taxi Ride With Us Today!']);
Route::view('/about','client.about',['title' => 'Cabs Online | About']);
Route::view('/services','client.services',['title' => 'Cabs Online | Services']);
Route::view('/become-driver','client.driver',['title' => 'Cabs Online | Become a Driver']);
Route::view('/login','auth.login',['title' => 'Cabs Online | Sing In']);
Route::view('/register','auth.register',['title' => 'Cabs Online | Sing Up']);
Route::view('/booking','client.ride',['title' => 'Cabs Online | Book a Ride']);

Route::group(["prefix"=>"booking","middleware"=>"auth"],function(){
    Route::prefix("admin")->group(function(){
        Route::get('/',[BookingController::class,'show'])->name('admin.booking.show');
        Route::post('/',[BookingController::class,'ajax'])->name('admin.booking.ajax');
        Route::post('/store',[BookingController::class,'storeByAdmin'])->name('admin.booking.store');
        Route::get('/{booking}/edit',[BookingController::class,'edit'])->name('admin.booking.edit');
        Route::post('/update',[BookingController::class,'update'])->name('admin.booking.update');
    });
    Route::prefix("client")->group(function(){
        Route::get('/{user}',[BookingController::class,'showByUserId'])->name('client.booking.show');
        Route::post('/{user}',[BookingController::class,'showByUserIdAjax'])->name('client.booking.ajax');
        Route::post('/store',[BookingController::class,'store'])->name('client.booking.store');
        Route::get('/{booking}/cancel',[BookingController::class,'cancel'])->name('client.booking.cancel');
    });
    Route::prefix("driver")->group(function(){
        Route::get('/{user}',[BookingController::class,'showByUserId'])->name('driver.booking.show');
        Route::post('/{user}',[BookingController::class,'showByUserIdAjax'])->name('driver.booking.ajax');
        Route::post('/{booking}/assign',[BookingController::class,'assign'])->name('driver.booking.assign');
    });
});

Route::group(["prefix"=>"expense","middleware"=>"auth"],function(){
    Route::prefix("driver")->group(function(){
        Route::get('/{user}',[ExpenseController::class,'show'])->name('driver.expense.show');
        Route::post('/{user}',[ExpenseController::class,'ajax'])->name('driver.expense.ajax');
        Route::post('/store',[ExpenseController::class,'store'])->name('driver.expense.store');
        Route::get('/{expense}/edit',[ExpenseController::class,'edit'])->name('driver.expense.edit');
        Route::post('/update',[ExpenseController::class,'update'])->name('driver.expense.update');
    });
    Route::prefix("admin")->group(function(){
        Route::get('/',[ExpenseController::class,'adminShow'])->name('admin.expense.show');
        Route::post('/',[ExpenseController::class,'adminAjax'])->name('admin.expense.ajax');
        Route::post('/store',[ExpenseController::class,'adminStore'])->name('admin.expense.store');
        Route::get('/{expense}/edit',[ExpenseController::class,'adminEdit'])->name('admin.expense.edit');
        Route::post('/update',[ExpenseController::class,'adminUpdate'])->name('admin.expense.update');
    });
});

Route::group(["prefix"=>"user","middleware"=>"auth"],function(){
    Route::prefix("admin")->group(function(){
        Route::get('/',[UserController::class,'show'])->name('user.admin.show');
        Route::post('/',[UserController::class,'ajax'])->name('user.admin.ajax');
        Route::post('/store',[UserController::class,'store'])->name('user.admin.store');
        Route::get('/{user}/edit',[UserController::class,'edit'])->name('user.admin.edit');
        Route::post('/update',[UserController::class,'update'])->name('user.admin.update');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
