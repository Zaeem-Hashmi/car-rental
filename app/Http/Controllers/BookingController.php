<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{
    public function show()
    {

    }
    public function ajax()
    {
        $query = Booking::query();
        $query = $query->with("driver","passenger");
        return DataTables::eloquent($query)
            ->toJson();
    }
    public function showByUserId(User $user)
    {

    }
    public function showByUserIdAjax(User $user)
    {

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
}
