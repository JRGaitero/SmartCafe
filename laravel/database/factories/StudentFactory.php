<?php

namespace Database\Factories;

use App\Models\User;

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
            "user_id"=>User::factory()->create()->id,
            'name' => $this->faker->name(),
            'surname' => $this->faker->word(),
            'course' => $this->faker->word(),
            'birthday' => $this->faker->date('d-m-Y')
        ];
    }
}
