<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password(),
            'phoneNumber' => $this->faker->numerify('### ### ###'),
            "profile_pic"=>$this->faker->imageUrl(640,480,"food",true),
            'role' => '',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
    public function student(): UserFactory
    {
        return $this->state(function () {
            return [
                'role' => 'student',
            ];
        });
    }
    public function school(): UserFactory
    {
        return $this->state(function () {
            return [
                'role' => 'school',
            ];
        });
    }
    public function cafe(): UserFactory
    {
        return $this->state(function () {
            return [
                'role' => 'cafe',
            ];
        });
    }
}
