<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('order_id');
            $table->integer('store_id');
            $table->integer('product_id');
            $table->integer('qty');
            $table->float('mrp_price');
            $table->float('seller_price');
            // $table->float('seller_total_price');
            $table->float('admin_charges');
            $table->float('pric_net_total_amout');
            // $table->float('govt_charges');
            // $table->integer('govt_charges_in_percent');
            $table->timestamps();
        });

        $data = [
            [
                'user_id' => 1,
                'order_id' => 2,
                'store_id' => 1,
                'product_id' => 1,
                'qty' => 1,
                'mrp_price' => 100.00,
                'seller_price' => 30.00,
                // 'seller_total_price' => 30.00,
                'admin_charges' => 33.00,
                'pric_net_total_amout' => 222.50,
                // 'govt_charges' => 13.00,
                // 'govt_charges_in_percent' => 18.00,
            ],

            [
                'user_id' => 1,
                'order_id' => 2,
                'store_id' => 1,
                'product_id' => 2,
                'qty' => 2,
                'mrp_price' => 200.00,
                'seller_price' => 30.00,
                // 'seller_total_price' => 60.00,
                'admin_charges' => 33.00,
                'pric_net_total_amout' => 222.50,
                // 'govt_charges' => 13.00,
                // 'govt_charges_in_percent' => 18.00,
            ],
        ];

        DB::table('order_items')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
