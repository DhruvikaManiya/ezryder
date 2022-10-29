<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->foreignId('make_id');
            $table->foreignId('model_id');
            $table->integer('distance')->comment('distance for 1 km')->default('1');
            $table->integer('rider_charge')->comment('charge for 1 km');
            $table->integer('customer_charge')->comment('charge for 1 km');
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
        Schema::dropIfExists('vehicle_charges');
    }
}
