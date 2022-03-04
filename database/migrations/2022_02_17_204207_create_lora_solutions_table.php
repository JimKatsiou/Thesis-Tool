<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoraSolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lora_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('lora_sensors_type_a');
            $table->integer('number_of_lora_sensors_type_a');
            $table->string('lora_sensors_type_b');
            $table->integer('number_of_lora_sensors_type_b');
            $table->string('lora_sensors_type_c');
            $table->integer('number_of_lora_sensors_type_c');
            $table->string('gateways_type_a');
            $table->integer('number_of_lora_gateways_type_a');
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
        Schema::dropIfExists('lora_solutions');
    }
}
