<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTaxi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('requests');

        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rider_id')->constrained('users', 'id')->onDelete('cascade');
            $table->string('pick_address');
            $table->string('drop_address');
            $table->string('distance')->nullable();
//            $table->foreignId('driver_id')->constrained('users','id')->onDelete('cascade')->nullable();
            $table->foreignId('vehicle_id')->nullable()->constrained('user_vehicle','id')->onDelete('cascade');
            $table->tinyInteger('is_schedule')->comment("1 Yes 0 No")->default("0");
            $table->dateTime('time')->nullable();
            $table->dateTime('pick_time')->nullable();
            $table->dateTime('drop_time')->nullable();
//            $table->tinyInteger('payment_type')->comment("1 Cash 2 Online")->nullable();
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
        Schema::dropIfExists('book_taxi');
    }
}
