<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;

class ProductFactory extends Factory
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
            "price"=>$this->faker->randomFloat(2,1,20),
            "description"=>$this->faker->sentence(3,6),
            "image"=>$this->faker->imageUrl(640,480,"food",true),
            "category"=>""

        ];
            }

    public function bebida()
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => 'bebida',
            ];
        });
    }
    public function comida()
    {
        return $this->state(function (array $attributes) {
            return [
                'category' => 'comida',
            ];
        });
    }
}
