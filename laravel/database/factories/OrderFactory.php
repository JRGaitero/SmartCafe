<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "amount"=>$this->faker->randomFloat(2,1,50),
            "date"=>$this->faker->date(),
            "is_completed"=>$this->faker->boolean(),
            "payment_info"=>$this->faker->sentence(5,5)
        ];
    }

}
