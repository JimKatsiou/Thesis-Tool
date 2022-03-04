<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class batterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sensors_battery')->insert([

            'capacity_5g_type_a'         => Int::random(30),
            'conusmption_cost_5g_type_a' => Str::random(30),
            'capacity_5g_type_b'         => int::random(30),
            'conusmption_cost_5g_type_b' => int::random(30),
            'capacity_5g_type_c'         => int::random(30),
            'conusmption_cost_5g_type_c' => int::random(30),
            'capacity_nb_type_a'         => int::random(30),
            'conusmption_cost_nb_type_a' => int::random(30),
            'capacity_nb_type_b'         => int::random(30),
            'conusmption_cost_nb_type_b' => int::random(30),
            'capacity_nb_type_c'         => int::random(30),
            'conusmption_cost_nb_type_c' => int::random(30),
            'capacity_lora_type_a'       => int::random(30),
            'conusmption_cost_lora_type_a' => int::random(30),
            'capacity_lora_type_b'         => int::random(30),
            'conusmption_cost_lora_type_b' => int::random(30),
            'capacity_lora_type_c'         => int::random(30),
            'conusmption_cost_lora_type_c' => int::random(30),
            'capacity_lora_gateway_type_a' => int::random(30),
            'conusmption_lora_gateway_type_a'=> int::random(30),

            'sensors_type_a' => int::random(30),
            'sensors_type_b' => int::random(30),
            'sensors_type_c' => int::random(30),

        ]);
    }
}
