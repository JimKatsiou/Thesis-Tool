<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create5GSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('5g_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('5g_sensors_type_a');
            $table->integer('number_of_5g_sensors_type_a');
            $table->string('5g_sensors_type_b');
            $table->integer('number_of_5g_sensors_type_b');
            $table->string('5g_sensors_type_c');
            $table->integer('number_of_5g_sensors_type_c');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('5_g_solutions');
    }
}
