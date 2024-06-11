<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
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
        Route::get('/create',[ExpenseController::class,'adminCreate'])->name('admin.expense.create');
        Route::get('/{expense}/edit',[ExpenseController::class,'adminEdit'])->name('admin.expense.edit');
        Route::post('/update',[ExpenseController::class,'adminUpdate'])->name('admin.expense.update');
        Route::get('/{expense}/delete',[ExpenseController::class,'adminDelete'])->name('admin.expense.delete');
    });
});

Route::group(["prefix"=>"user","middleware"=>"auth"],function(){
    Route::prefix("admin")->group(function(){
        Route::get('/',[UserController::class,'show'])->name('user.admin.show');
        Route::post('/',[UserController::class,'ajax'])->name('user.admin.ajax');
        Route::get('/create',[UserController::class,'create'])->name('user.admin.create');
        Route::post('/store',[UserController::class,'store'])->name('user.admin.store');
        Route::get('/{user}/edit',[UserController::class,'edit'])->name('user.admin.edit');
        Route::post('/update',[UserController::class,'update'])->name('user.admin.update');
        Route::get('/{user}/delete',[UserController::class,'delete'])->name('user.admin.delete');
    });
});
Route::group(["prefix"=>"driver","middleware"=>"auth"],function(){
    Route::prefix("admin")->group(function(){
        Route::get('/',[DriverController::class,'show'])->name('driver.admin.show');
        Route::post('/',[DriverController::class,'ajax'])->name('driver.admin.ajax');
        Route::get('/create',[DriverController::class,'create'])->name('driver.admin.create');
        Route::post('/store',[DriverController::class,'store'])->name('driver.admin.store');
        Route::get('/{driver}/edit',[DriverController::class,'edit'])->name('driver.admin.edit');
        Route::post('/update',[DriverController::class,'update'])->name('driver.admin.update');
        Route::get('/{driver}/delete',[DriverController::class,'delete'])->name('driver.admin.delete');
    });
});
Route::group(["prefix"=>"vehicle","middleware"=>"auth"],function(){
    Route::prefix("admin")->group(function(){
        Route::get('/',[VehicleController::class,'show'])->name('vehicle.admin.show');
        Route::post('/',[VehicleController::class,'ajax'])->name('vehicle.admin.ajax');
        Route::get('/create',[VehicleController::class,'create'])->name('vehicle.admin.create');
        Route::post('/store',[VehicleController::class,'store'])->name('vehicle.admin.store');
        Route::get('/{vehicle}/edit',[VehicleController::class,'edit'])->name('vehicle.admin.edit');
        Route::post('/update',[VehicleController::class,'update'])->name('vehicle.admin.update');
        Route::get('/{vehicle}/delete',[VehicleController::class,'delete'])->name('vehicle.admin.delete');
    });
});
Route::group(["prefix"=>"administration","middleware"=>"auth"],function(){
    Route::prefix("users")->group(function(){
        Route::get('/',[AdministrationController::class,'show'])->name('administaration.user.show');
        Route::post('/',[AdministrationController::class,'ajax'])->name('administaration.user.ajax');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
