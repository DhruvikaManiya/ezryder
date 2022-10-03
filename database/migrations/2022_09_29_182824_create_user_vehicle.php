<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');
            $table->string('vehicle_number');
            $table->string('vehicle_name');
            $table->text('vehicle_image')->nullable();
            $table->string('vehicle_make');
            $table->string('vehicle_modal');
            $table->string('number_of_seats');
            $table->string('distance');
            $table->string('charge');
            $table->tinyInteger('is_active')->default("1")->comment("1 Active 0 In-Active");
            $table->foreignId('vehicle_type_id')->constrained('vehicle_type','id')->onDelete('cascade');
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
        Schema::dropIfExists('user_vehicle');
    }
}