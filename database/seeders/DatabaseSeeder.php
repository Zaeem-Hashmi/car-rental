<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Expense;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(PassengerUserSeeder::class);
        $this->call(DriverUserSeeder::class);
        Booking::factory()->count(10)->create();
        Expense::factory()->count(10)->create();
    }
}
