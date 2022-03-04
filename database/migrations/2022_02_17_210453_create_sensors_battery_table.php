<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsBatteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_battery', function (Blueprint $table) {
            $table->id();
            $table->double('capacity_5g_type_a');
            $table->double('conusmption_cost_5g_type_a');
            $table->double('capacity_5g_type_b');
            $table->double('conusmption_cost_5g_type_b');
            $table->double('capacity_5g_type_c');
            $table->double('conusmption_cost_5g_type_c');
            $table->double('capacity_nb_type_a');
            $table->double('conusmption_cost_nb_type_a');
            $table->double('capacity_nb_type_b');
            $table->double('conusmption_cost_nb_type_b');
            $table->double('capacity_nb_type_c');
            $table->double('conusmption_cost_nb_type_c');
            $table->double('capacity_lora_type_a');
            $table->double('conusmption_cost_lora_type_a');
            $table->double('capacity_lora_type_b');
            $table->double('conusmption_cost_lora_type_b');
            $table->double('capacity_lora_type_c');
            $table->double('conusmption_cost_lora_type_c');
            $table->double('capacity_lora_gateway_type_a');
            $table->double('conusmption_lora_gateway_type_a');
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
        Schema::dropIfExists('sensors_battery');
    }
}
