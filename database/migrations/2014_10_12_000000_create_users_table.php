<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();;
            $table->string('area')->nullable();;
            $table->string('city')->nullable();;
            $table->string('state')->nullable();;
            $table->string('country')->nullable();;
            $table->integer('pincode')->nullable();;
            $table->string('store_type')->default(1)->comment('1=Grocery,2=Food,3=Pharmacy');
            $table->string('profile')->nullable();;
            $table->string('type')->default(0)->comment('admin => 1, vandor => 2 , delivery => 3 , rider => 4, customer => 0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // add data
        DB::table('users')->insert(
            array(
                [

                    'name' => 'admin',
                    'email' => 'admin@admin.com',
                    'password' => Hash::make('12345678'),
                    'type' => 1,
                ],
                [

                    'name' => 'vendor',
                    'email' => 'abc@vendor.com',
                    'password' => Hash::make('12345678'),
                    'type' => 2,
                ],
                [

                    'name' => 'delivery',
                    'email' => 'abc@delivery.com',
                    'password' => Hash::make('12345678'),
                    'type' => 3,
                ],
                [

                    'name' => 'rider',
                    'email' => 'abc@rider.com',
                    'password' => Hash::make('12345678'),
                    'type' => 4,
                ],
                [
                    'name' => 'customer',
                    'email' => 'abc@gmail.com',
                    'password' => Hash::make('12345678'),
                    'type' => 0,
                ],
                
            )
            
        );
        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
