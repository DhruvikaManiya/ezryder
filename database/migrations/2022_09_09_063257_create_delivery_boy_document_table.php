<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBoyDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_boy_document', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('id_front')->nullable();
            $table->string('id_back')->nullable();
            $table->string('licence_front')->nullable();
            $table->string('licence_back')->nullable();
            $table->string('vehicle_front')->nullable();
            $table->string('vehicle_back')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('delivery_boy_document');
    }
}
