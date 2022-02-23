<?php

namespace Database\Factories;

use App\Models\School;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'location' => $this->faker->word(),
            'is_open' => ''
        ];
    }

    public function isOpen(): SchoolFactory
    {
        return $this->state(function () {
            return [
                'is_open' => true,
            ];
        });
    }

    public function isNotOpen(): SchoolFactory
    {
        return $this->state(function () {
            return [
                'is_open' => false,
            ];
        });
    }
}
