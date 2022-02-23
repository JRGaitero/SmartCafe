<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Order;
use App\Models\Product;
use App\Models\School;
use Database\Factories\CafeFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $cafes = Cafe::factory()
            ->has(School::factory()
                    ->count(1)
                    ->isOpen())

            ->has(School::factory()
                ->count(1)
                ->isNotOpen())
            ->count(4)
            ->isOpen()
            ->create();





    }
}
