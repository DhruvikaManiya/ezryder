<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
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
            [
                'name' => 'Fruits',
                'description' => 'Fruits',
                'image' => '/images/category/100001662544277.png',
                'type' => 1,
            ],
            [
                'name' => 'Flour',
                'description' => 'Flour',
                'image' => '/images/category/flour.png',
                'type' => 1,
            ],
            [
                'name' => 'Oil',
                'description' => 'Oil',
                'image' => '/images/category/olive-oil.png',
                'type' => 1,
            ],
           
            [
                'name' => 'ketchup',
                'description' => 'ketchup',
                'image' => '/images/category/ketchup.png',
                'type' => 1,
            ],
            

            // food
            [
                'name' => 'Pizza',
                'description' => 'fast-food',
                'image' => 'asset/images/pizza.svg',
                'type' => 2,
            ],

            [
                'name' => 'Burger',
                'description' => 'fast-food',
                'image' => 'asset/images/burger.svg',
                'type' => 2,
            ],
            [
                'name' => 'pastry',
                'description' => 'sweetes',
                'image' => '/images/category/cake.png',
                'type' => 2 ,
            ],
            // Pharmacy
            [
                'name' => 'Medicine',
                'description' => 'help to recover your health',
                'image' => '/images/category/medicine.png',
                'type' => 3,
            ],
            [
                'name' => 'Vitamins',
                'description' => 'help to recover your health',
                'image' => '/images/category/vitamins.png',
                'type' => 3,
            ],
            [
                'name' => 'Ayurveda',
                'description' => 'help to recover your health',
                'image' => '/images/category/ayurveda.png',
                'type' => 3,
            ],
            [
                'name' => 'Homeopathy',
                'description' => 'help to recover your health',
                'image' => '/images/category/phytotherapy.png',
                'type' => 3,
            ], 
             [
                'name' => 'Surgeries',
                'description' => 'help to recover your health',
                'image' => '/images/category/surgery-room.png',
                'type' => 3,
            ],

            // [
            //     'name' => 'HealthCare',
            //     'description' => 'help to recover your health',
            //     'image' => '/images/category/stethoscope.png',
            //     'type' => 3,
            // ],
            
        ];
        DB::table('categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
