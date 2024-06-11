<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DriverUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::firstOrNew([
            "email"=>"driver@urbanride.com"
        ]);
        
        $user->role_id = User::DRIVER_ROLE;
        $user->username = "driver";
        $user->address_1 = "street 2, house no 15, model town";
        $user->address_2 = "Street no 10, statellite town";
        $user->city = "Bahawalpur";
        $user->lisence_number = "#RRES2324234";
        $user->password = Hash::make("password");
        $user->save();
    }
}
