<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function show()
    {
        return view('admin.booking.show');
    }
    public function ajax()
    {
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function showforBooking(User $user)
    {
        return view('driver.booking.show');
    }
    public function showforBookingAjax(User $user)
    {
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("status","unassigned");
        $query = $query->where("driver_id",null);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function bookingByUserAjax(){
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("driver_id",auth()->user()->id);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function store(Request $request)
    {
        dd($request->all());
        $validate = $request->validate([

        ]);

        $booking = new Booking();

        $booking->save();
    }

    public function storeByAdmin(Request $request)
    {
        $validate = $request->validate([

        ]);

        $booking = new Booking();

        $booking->save();
    }

    public function edit(Request $request, Booking $booking){
        $validate = $request->validate([

        ]);

        
        $booking->save();

    }

    public function update(Request $request)
    {
        $validate = $request->validate([

        ]);

        $booking = new Booking();

        $booking->save();
    }
    public function status(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            "status"=>true,
            "message"=>"Ride status updated to ".$request->status
        ]);
    }
    public function assign(Request $request)
    {
        $booking = Booking::find($request->booking_id);
        $booking->status = $request->status;
        if ($request->status == "assigned") {
           $booking->driver_id = $request->user;
        }
        $booking->save();

        return response()->json([
            "status"=>true,
            "message"=>"Ride status updated to ".$request->status
        ]);
    }
}

