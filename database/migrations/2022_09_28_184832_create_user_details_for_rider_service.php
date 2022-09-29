<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsForRiderService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_document', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->comment('1 service provider 2 rider');
            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');
            $table->text('id_proof_front')->nullable();
            $table->text('id_proof_back')->nullable();
            $table->text('licence_front')->nullable();
            $table->text('licence_back')->nullable();
            $table->text('vehicle_front')->nullable();
            $table->text('vehicle_back')->nullable();
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
        Schema::dropIfExists('user_details_for_rider_service');
    }
}
