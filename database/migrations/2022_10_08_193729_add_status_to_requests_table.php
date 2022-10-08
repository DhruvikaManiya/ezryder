<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->comment('1 In progress 2 Accepted 3 Pick 4 Completed')->after('drop_time');
            $table->string('message')->default("You created request wait response from drive")->after('status');
            $table->tinyInteger('payment_status')->default(1)->comment('1 Not Paid 2 Cash  3 Online')->after('message');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            //
        });
    }
}
