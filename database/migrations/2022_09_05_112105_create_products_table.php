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
            $table->float('mrp_price')->nullable();
            $table->float('seller_price')->nullable();
            $table->integer('admin_charge')->nullable();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcate_id');
            $table->integer('store_type_id');
            $table->integer('store_id');
            $table->string('p_image');
            $table->integer('units');
            $table->string('measurement');
            $table->integer('admin_by_verify')->default(0)->comment('verified => 1 , not_verify => 0');
            $table->integer('vendor_status')->default(0)->comment('active => 1, inactive => 0');
            
           

            $table->timestamps();
        });
        $data = [
            [
                'name' => 'fruits-Store : Banana',
                'description' => 'D-Mart',
                'seller_price' => '10',
                'mrp_price' => '200',
                'store_id' => 1,
                'store_type_id' => '1',
                'p_image' => '/images/product/99991662557487.svg',
                'units' => '12',
                'measurement' => 'dozen',
                'subcate_id' => 1,
                'category_id'=>1,
                // 'status' => 1,
                'user_id' => 2,
                // 'verify'=>1,
                'admin_charge'=>10,
                // 'quantity'=>100,
               
            ],
             [
                'name' => 'fruits-Store : cdsdscc',
                'description' => 'D-Mart',
                'seller_price' => '10',
                'mrp_price' => '200',
                'store_id' => 1,
                'store_type_id' => '1',
                'p_image' => '/images/product/flour_bg.jpg',
                'units' => '12',
                'measurement' => 'dozen',
                'subcate_id' => 1,
                'category_id'=>1,
                // 'status' => 1,
                'user_id' => 2,
                // 'verify'=>1,
                'admin_charge'=>10,
                // 'quantity'=>100,
               
            ],
             [
                'name' => ' abc',
                'description' => 'D-Mart',
                'seller_price' => '10',
                'mrp_price' => '200',
                'store_id' => 2,
                'store_type_id' => '1',
                'p_image' => '/images/product/sunflower_oil_bg.jpg',
                'units' => '12',
                'measurement' => 'dozen',
                'subcate_id' => 1,
                'category_id'=>1,
                // 'status' => 1,
                'user_id' => 2,
                // 'verify'=>1,
                'admin_charge'=>10,
                // 'quantity'=>100,
               
            ],
            // [
            //     'name' => 'Oil Store : Sunflower-Oil',
            //     'description' => 'D-Mart ',
            //     'seller_price' => '170',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',


            //     'p_image' => '/images/product/sunflower_oil_bg.jpg',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 2,
            //     // 'status' => 1,
            //     'user_id' => 2,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>200

            // ],
            // [
            //     'name' => 'flour-Store : weat Flour ',
            //     'description' => 'D-Mart',
            //     'seller_price' => '20',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/flour_bg.jpg',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 2,
            //     // 'status' => 1,
            //     'user_id' => 2,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>50

            // ],
            // [
            //     'name' => 'Ketchup-Store : Tometo',
            //     'description' => 'DMart Kirana Store',
            //     'seller_price' => '100',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/ketchup_bg.jpeg',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 3,
            //     // 'status' => 1,
            //     'user_id' => 2,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>4

            // ],
            // //food
            // [
            //     'name' => 'lapinoz pizza : Tometo',
            //     'description' => 'Restaurant',
            //     'seller_price' => '100',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/pizza.webp',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 17,
            //     // 'status' => 1,
            //     'user_id' => 3,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>20,

            // ], [
            //     'name' => 'Shakti sandwich : Grill Sandwich',
            //     'description' => 'Restaurant',
            //     'seller_price' => '100',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/sandwich.webp',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 18,
            //     // 'status' => 1,
            //     'user_id' => 3,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>100,

            // ],
            // [
            //     'name' => 'Atul store : black foreast cake',
            //     'description' => 'Restaurant',
            //     'seller_price' => '100',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/cake.webp',
            //     'units' => '1',
            //     'measurement' => 'kg',
            //     'subcate_id' => 21,
            //     // 'status' => 1,
            //     'user_id' => 3,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>100,

            // ],

            // //pharamacy
            // [
            // 'name' => 'Health Care Pharmacy : cyclopentolate',
            //     'description' => 'Restaurant',
            //     'seller_price' => '100',
            //     'mrp_price' => '200',
            //     'store_id' => 1,
            //     'store_type_id' => '1',

            //     'p_image' => '/images/product/medicine1.jpg',
            //     'units' => '500',
            //     'measurement' => 'ml',
            //     'subcate_id' => 25, 
            //     // 'status' => 1,
            //     'user_id' => 4,
            //     // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>100,

            // ],
            // [
            //     'name' => 'Health Care Pharmacy : cyclopentolate',
            //         'description' => 'Restaurant',
            //         'seller_price' => '100',
            //         'mrp_price' => '200',
            //         'store_id' => 1,
            //     'store_type_id' => '1',

            //         'p_image' => '/images/product/medicine1.jpg',
            //         'units' => '500',
            //         'measurement' => 'ml',
            //         'subcate_id' => 28,
            //         // 'status' => 1,
            //         'user_id' => 4,
            //         // 'verify'=>1,
            //     'admin_charge'=>10,
            //     // 'quantity'=>100,

            //     ],
            // [
            //     'name' => 'Health Care Pharmacy : cyclopentolate',
            //         'description' => 'Restaurant',
            //         'seller_price' => '100',
            //         'mrp_price' => '200',
            //         'store_id' => 1,
            //     'store_type_id' => '1',

            //         'p_image' => '/images/product/medicine1.jpg',
            //         'units' => '500',
            //         'measurement' => 'ml',
            //         'subcate_id' => 32,
            //         // 'status' => 1,
            //         'user_id' => 4,
            //         // 'verify'=>1,
            //         'admin_charge'=>10,
            //         // 'quantity'=>150,

            //     ]

           
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