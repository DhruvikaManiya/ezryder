<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->string('type')->comment('Grocery => 1, Food => 2 , Pharmacy => 3 ');
            $table->softDeletes(); 
            $table->timestamps();
        });
           // add data

           $data = [
            //grocery
            [
                'name' => 'Fruits',
                'description' => 'Fruits',
                'image' => '/images/slider/Group 137 (1).png',
                'type' => 1,
            ],
            [
                'name' => 'Fruits',
                'description' => 'Fruits',
                'image' => '/images/slider/Group 137 (1).png',
                'type' => 1,
            ],

            // food
            [
                'name' => 'burger',
                'description' => 'burger',
                'image' => '/images/slider/offer.png',
                'type' => 2,
            ],
            [
                'name' => 'burger',
                'description' => 'burger',
                'image' => '/images/slider/offer.png',
                'type' => 2,
            ],

            //pharmacy
            [
                'name' => 'medicine',
                'description' => 'medicine',
                'image' => '/images/slider/Group 234.png',
                'type' => 3,
            ],
            [
                'name' => 'medicine',
                'description' => 'medicine',
                'image' => '/images/slider/Group 234.png',
                'type' => 3,
            ],
        ];
        DB::table('sliders')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
