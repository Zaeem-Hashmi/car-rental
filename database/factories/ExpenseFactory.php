<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "expenseType"=>$this->faker->name,
            "expenseAmount"=>$this->faker->numberBetween(111,[1000]),
            "expenseDescription"=>$this->faker->name,
            "user_id"=>User::where("role_id",2)->first(),
        ];
    }
}
