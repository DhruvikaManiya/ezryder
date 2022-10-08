<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_action', function (Blueprint $table) {
            $table->id();

            $table->foreignId('request_id')->nullable()->constrained('requests', 'id')->onDelete('cascade');

            $table->integer('is_accept')->comment('1 Accept 0 Reject')->default("0");

            $table->string('is_accept_message')->nullable();

            $table->foreignId('user_id')->constrained('users','id')->onDelete('cascade');

            $table->string('otp')->nullable()->comment('1 Accept 0 Reject');

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
        Schema::dropIfExists('request_action');
    }
}
