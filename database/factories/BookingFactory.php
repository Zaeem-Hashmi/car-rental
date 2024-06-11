<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id"=>User::where("role_id",User::PASSENGER_ROLE)->first()->id,
            "driver_id"=>User::where("role_id",User::DRIVER_ROLE)->first()->id,
            "bookingRefNo"=>Uuid::uuid4()->toString(),
            "pickupUnitNumber"=>$this->faker->name(),
            "pickupStreetNumber"=>$this->faker->numberBetween(111,[1000]),
            "pickupStreetName"=>$this->faker->name(),
            "pickupAreaName"=>$this->faker->name(),
            "pickupCity"=>$this->faker->name(),
            "pickupDate"=>Carbon::now()->format('Y-m-d'),
            "pickupTime"=>Carbon::now()->format('H:i'),
            "dropoffUnitNumber"=>$this->faker->numberBetween(1,[10]),
            "dropoffStreetNumber"=>$this->faker->name(),
            "dropoffStreetName"=>$this->faker->name(),
            "dropoffAreaName"=>$this->faker->name(),
            "dropoffCity"=>$this->faker->name(),
            "dropoffDate"=>Carbon::now()->format('Y-m-d'),
            "dropoffTime"=>Carbon::now()->format('H:i'),
            "status"=>"assigned"
        ];
    }
}
