<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('status')->default(0)->comment('0:unread,1:read');
            $table->timestamps();
        });

        $data = [
            [
                'user_id' => 1,
                'title' => 'new order created',
            ],
            
            
        ];

        DB::table('notifications')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
