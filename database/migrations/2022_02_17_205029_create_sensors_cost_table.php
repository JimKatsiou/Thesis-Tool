<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors_cost', function (Blueprint $table) {
            $table->id();
            $table->double('cost_5g_type_a');
            $table->double('installation_cost_5g_type_a');
            $table->double('cost_5g_type_b');
            $table->double('installation_cost_5g_type_b');
            $table->double('cost_5g_type_c');
            $table->double('installation_cost_5g_type_c');
            $table->double('cost_nb_type_a');
            $table->double('installation_cost_nb_type_a');
            $table->double('cost_nb_type_b');
            $table->double('installation_cost_nb_type_b');
            $table->double('cost_nb_type_c');
            $table->double('installation_cost_nb_type_c');
            $table->double('cost_lora_type_a');
            $table->double('installation_cost_lora_type_a');
            $table->double('cost_lora_type_b');
            $table->double('installation_cost_lora_type_b');
            $table->double('cost_lora_type_c');
            $table->double('installation_cost_lora_type_c');
            $table->double('cost_lora_gateway_type_a');
            $table->double('installation_lora_gateway_type_a');
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
        Schema::dropIfExists('sensors_cost');
    }
}
