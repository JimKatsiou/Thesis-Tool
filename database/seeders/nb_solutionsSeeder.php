<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class nb_solutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //nb_iot_solutions::factory()->time(50)->create();

        DB::table('nb_iot_solutions')->insert([

            'sensors_type_a' => Str::random(10),
            'number_of_nb_iot_sensors_type_a' => int::random(5),
            'sensors_type_b' => Str::random(10),
            'number_of_nb_iot_sensors_type_b'  => int::random(10),
            'sensors_type_c' => Str::random(10),
            'number_of_nb_iot_sensors_type_c'  => int::random(10),

        ]);
    }
}
