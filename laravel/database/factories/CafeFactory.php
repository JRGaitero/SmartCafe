<?php

namespace Database\Factories;

use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;

class CafeFactory extends Factory
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
            "name"=>$this->faker->name(),
            "is_open"=>"",
            "location"=>$this->faker->word(),

        ];
    }
    public function isOpen(): CafeFactory
    {
        return $this->state(function () {
            return [
                'is_open' => true,
            ];
        });
    }

    public function isNotOpen(): CafeFactory
    {
        return $this->state(function () {
            return [
                'is_open' => false,
            ];
        });
    }
}
