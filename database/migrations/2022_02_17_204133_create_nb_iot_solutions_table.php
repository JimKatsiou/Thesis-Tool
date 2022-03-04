<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNbIotSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nb_iot_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('nb_iot_sensors_type_a');
            $table->integer('number_of_nb_iot_sensors_type_a');
            $table->string('nb_iot_sensors_type_b');
            $table->integer('number_of_nb_iot_sensors_type_b');
            $table->string('nb_iot_sensors_type_c');
            $table->integer('number_of_nb_iot_sensors_type_c');
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
        Schema::dropIfExists('nb_iot_solutions');
    }
}
