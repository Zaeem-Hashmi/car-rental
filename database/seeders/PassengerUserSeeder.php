<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PassengerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::firstOrNew([
            "email"=>"passenger@urbanride.com"
        ]);
        
        $user->role_id = User::PASSENGER_ROLE;
        $user->username = "passenger";
        $user->password = Hash::make("password");
        $user->save();
    }
}
