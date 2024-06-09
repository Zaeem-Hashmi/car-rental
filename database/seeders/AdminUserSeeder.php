<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::firstOrNew([
            "email"=>"admin@urbanride.com"
        ]);
        
        $user->role_id = User::ADMIN_ROLE;
        $user->username = "admin";
        $user->password = bcrypt("password");
        $user->save();
    }
}
