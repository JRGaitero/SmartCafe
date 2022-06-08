<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

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
            "student_id"=>function(){
                return DB::table("students")->inRandomOrder()->first()->id;
            },
            "amount"=>$this->faker->randomFloat(2,1,50),
            "date"=>$this->faker->date(),
            "is_completed"=>$this->faker->boolean()
        ];
    }

}
