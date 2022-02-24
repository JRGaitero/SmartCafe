<?php

namespace Database\Seeders;

use App\Models\Cafe;
use App\Models\Order;
use App\Models\Product;
use App\Models\School;
use App\Models\Student;
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

        //----Creacion cafe1, se crea un cafe con 2 escuelas relacionadas y estas 2 con 2 alumnos cada uno-----------------------------
        $cafes_1 = Cafe::factory()
            //----Creacion de la primera escuela relacionada con le cafe1, esta estara abierta-----------------------------
            ->has(School::factory()
                //----Se crean 2 estudiantes para la primera escuela relacionada con el cafe1-----------------------------
                ->has(Student::factory()
                        ->count(2))
                    ->count(1)
                    ->isOpen())

            ->has(School::factory()
                ->has(Student::factory()
                        ->count(2))
                ->count(1)
                ->isNotOpen())
            ->count(1)
            ->isOpen()
            ->create();


        //-------Creacion cafe2, se crea una escuela realcionada para este cafe con 5 alumnos
        $cafes_2 = Cafe::factory()
            //----Creacion de la escuela relacionada con el cafe2, esta estara abierta-----------------------------
            ->has(School::factory()
                //----Se crean 25 estudiantes para la  escuela relacionada con el cafe2---------------------------
                ->has(Student::factory()
                    ->count(5))
                ->count(1)
                ->isOpen())
            ->count(1)
            ->isOpen()
            ->create();

        //Creacion de 5 pedidos, cada uno con 3 productos relacionados, 1 bebida y 2 comidas
        $oders_1 = Order::factory()

            ->has(Product::factory()
                    ->drink()
                    ->count(1))

            ->has(Product::factory()
                ->food()
                ->count(2))

            ->count(4)
            ->create();
    }
}
