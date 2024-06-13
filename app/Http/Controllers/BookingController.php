<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Notifications\DriverNotification;
use App\Notifications\RidebookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function show()
    {
        return view('admin.booking.show');
    }
    public function ajax(Request $request)
    {
        if ($request->type == "booked") {
            return $this->allBookedRides();
        }
        if ($request->type == "unassigned") {
            return $this->allUnassignedRides();
        }
        if ($request->type == "cancel") {
            return $this->allCancelRides();
        }
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function allBookedRides(){
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("status","<>","unassigned");
        $query = $query->where("driver_id","<>",null);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function allUnassignedRides(){
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("status","unassigned");
        $query = $query->where("driver_id",null);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function allCancelRides(){
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("status","cancel");
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
    public function showPassengerBooking()
    {
        return view('client.ride-list');
    }
    public function showPassengerAjax()
    {
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        $query = $query->where("user_id",auth()->user()->id);
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "pk_unit_numer"=>"required",
            "pk_street_number"=>"required",
            "pk_area"=>"required",
            "pk_time"=>"required",
            "pk_date"=>"required",
        ]);
        $booking = new Booking();

            $booking->user_id=auth()->user()->id;
            $booking->bookingRefNo=Uuid::uuid4()->toString();
            $booking->pickupUnitNumber=$request->pk_unit_numer;
            $booking->pickupStreetNumber=$request->pk_street_number;
            $booking->pickupStreetName=$request->pk_street_name;
            $booking->pickupAreaName=$request->pk_area;
            $booking->pickupCity=$request->pk_city;
            $booking->pickupDate=$request->pk_date;
            $booking->pickupTime=$request->pk_time;
            $booking->dropoffUnitNumber=$request->dp_unit_number;
            $booking->dropoffStreetNumber=$request->dp_street_number;
            $booking->dropoffStreetName=$request->dp_street_name;
            $booking->dropoffAreaName=$request->dp_area;
            $booking->dropoffCity=$request->dp_city;
            $booking->status="unassigned";
            $booking->save();

            $user = User::find(Auth::user()->id);
            $user->notify(new RidebookingNotification);
            $drivers = User::where("role_id",2)->get();
            foreach ($drivers as $key => $driver) {
                $driver->notify(new DriverNotification());
            }
            return redirect()->back()->with("success","Booking successful");
    }
    public function cancel(Booking $booking) {
        $booking->status = "cancel";
        $booking->save();
        return redirect()->back()->with("cancel","Booking cancel Successfully");
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
        if ($request->status == "unassigned") {
            $booking->driver_id = null;
         }
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
        if ($request->status == "unassigned") {
            $booking->driver_id = null;
         }
         if ($request->status == "complete") {
            $booking->cost = $request->cost;
         }
        $booking->save();

        return response()->json([
            "status"=>true,
            "message"=>"Ride status updated to ".$request->status
        ]);
    }
}

