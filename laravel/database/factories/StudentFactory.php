<?php

namespace Database\Factories;

use App\Models\User;

use App\Models\School;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "school_id"=>function(){
                return DB::table("school")->inRandomOrder()->first()->id;
            },
            "user_id"=>User::factory()->create()->id,
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'course' => $this->faker->word(),
            'birthday' => $this->faker->date('d-m-Y')
        ];
    }
}
