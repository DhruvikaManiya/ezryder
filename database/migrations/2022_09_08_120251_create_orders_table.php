<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('store_id');
            $table->integer('store_user_id')->nullable();
            $table->integer('delivery_boy_user_id')->nullable();
            $table->integer('delivery_status')->default(0);
            $table->float('seller_total_price');
            $table->float('seller_govt_taxes');
            $table->float('seller_total_with_govt_taxes');
            $table->float('admin_total_charges');
            $table->float('net_total_price_before_tax');
            $table->float('govt_taxes');
            $table->float('net_total_price_after_tax');
            $table->float('delivery_charges');
            $table->float('net_total');
            $table->float('packaging_charges'); 
            $table->string('delivery_distance_kms')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('delivery_adress_mark')->nullable();
            $table->string('delivery_lat')->nullable();
            $table->string('delivery_long')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });

        $data = [
            [
                'user_id' => 1,
                'store_id' => 1,
                'seller_total_price' => 20.00,
                'seller_govt_taxes' =>  4.00,
                'seller_total_with_govt_taxes' => 24.00,
                'admin_total_charges' => 2.00,
                'net_total_price_before_tax' => 22.00,
                'govt_taxes' => 4.40,
                'net_total_price_after_tax' => 26.40,
                'delivery_charges' => 2.00,
                'net_total' => 28.40,
                'packaging_charges'=> 1,

                
            ],
            [
                'user_id' => 1,
                'store_id' => 1,
                
                'seller_total_price' => 40.00,
                'seller_govt_taxes' =>  8.00,
                'seller_total_with_govt_taxes' => 48.00,
                'admin_total_charges' => 4.00,
                'net_total_price_before_tax' => 44.00,
                'govt_taxes' => 8.80,
                'net_total_price_after_tax' => 52.80,
                'delivery_charges' => 4.00,
                'net_total' => 56.80,
                 'packaging_charges'=> 1,
                
            ],
            
        ];

        DB::table('orders')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
