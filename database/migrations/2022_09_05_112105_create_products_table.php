<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->float('price');
            $table->integer('Dis_price');
            $table->integer('subcate_id');
            $table->string('p_image');
            $table->integer('units');
            $table->string('measurement');
            $table->string('status')->default(0);
            $table->integer('user_id');
            $table->timestamps();
        });
        $data = [
            [
                'name' => 'fruits-Store : Banana',
                'description' => 'D-Mart',
                'price' => '10',
                'Dis_price' => '10',
                'p_image' => '/images/product/99991662557487.svg',
                'units' => '12',
                'measurement' => 'dozen',
                'subcate_id' => 1,
                'status' => 1,
                'user_id' => 2,
            ],
            [
                'name' => 'Oil Store : Sunflower-Oil',
                'description' => 'D-Mart ',
                'price' => '170',
                'Dis_price' => '11',
                'p_image' => '/images/product/sunflower_oil_bg.jpg',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 2,
                'status' => 1,
                'user_id' => 2,
            ],
            [
                'name' => 'flour-Store : weat Flour ',
                'description' => 'D-Mart',
                'price' => '20',
                'Dis_price' => '4',
                'p_image' => '/images/product/flour_bg.jpg',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 2,
                'status' => 1,
                'user_id' => 2,
            ],
            [
                'name' => 'Ketchup-Store : Tometo',
                'description' => 'DMart Kirana Store',
                'price' => '100',
                'Dis_price' => '30',
                'p_image' => '/images/product/ketchup_bg.jpeg',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 3,
                'status' => 1,
                'user_id' => 2,
            ],
            //food
            [
                'name' => 'lapinoz pizza : Tometo',
                'description' => 'Restaurant',
                'price' => '100',
                'Dis_price' => '30',
                'p_image' => '/images/product/pizza.webp',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 17,
                'status' => 1,
                'user_id' => 2,
            ], [
                'name' => 'Shakti sandwich : Grill Sandwich',
                'description' => 'Restaurant',
                'price' => '100',
                'Dis_price' => '30',
                'p_image' => '/images/product/sandwich.webp',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 18,
                'status' => 1,
                'user_id' => 2,
            ],
            [
                'name' => 'Atul store : black foreast cake',
                'description' => 'Restaurant',
                'price' => '100',
                'Dis_price' => '30',
                'p_image' => '/images/product/cake.webp',
                'units' => '1',
                'measurement' => 'kg',
                'subcate_id' => 21,
                'status' => 1,
                'user_id' => 2,
            ],

            //pharamacy
            [
            'name' => 'Health Care Pharmacy : cyclopentolate',
                'description' => 'Restaurant',
                'price' => '100',
                'Dis_price' => '30',
                'p_image' => '/images/product/medicine1.jpg',
                'units' => '500',
                'measurement' => 'ml',
                'subcate_id' => 25, 
                'status' => 1,
                'user_id' => 2,
            ],
            [
                'name' => 'Health Care Pharmacy : cyclopentolate',
                    'description' => 'Restaurant',
                    'price' => '100',
                    'Dis_price' => '30',
                    'p_image' => '/images/product/medicine1.jpg',
                    'units' => '500',
                    'measurement' => 'ml',
                    'subcate_id' => 28,
                    'status' => 1,
                    'user_id' => 2,
            ],
            [
                'name' => 'Health Care Pharmacy : cyclopentolate',
                    'description' => 'Restaurant',
                    'price' => '100',
                    'Dis_price' => '30',
                    'p_image' => '/images/product/medicine1.jpg',
                    'units' => '500',
                    'measurement' => 'ml',
                    'subcate_id' => 32,
                    'status' => 1,
                    'user_id' => 2,
                ]

           
    ];
    DB::table('products')->insert($data);
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
