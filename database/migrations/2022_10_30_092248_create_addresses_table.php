<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('full_address');
            $table->string('mark')->nullable();
            $table->string('lat');
            $table->string('long');
            $table->integer('default')->default(0);
            $table->timestamps();
        });
        $data = [
            [
                'user_id' => 7,
                'full_address' => 'this is test  address',
                'mark' => 'not near ',
                'lat' => 44.000,
                'long' => -77.2,
                'default' => 1,


                
            ],
        ];
        DB::table('addresses')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
