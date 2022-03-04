<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(five_g_solutionsSeeder::class);
        $this->call([
            //five_g_solutionsSeeder::class,
            nb_solutionsSeeder::class,
            lora_solutionsSeeder::class,
            costSeeder::class,
            batterySeeder::class,
        ]);
    }
}
