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
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->integer('pincode')->nullable();
            $table->integer('store_type_id')->nullable();
            $table->string('profile')->nullable();
            $table->string('type')->default(0)->comment('admin => 1, vendor => 2 , delivery => 3 , rider => 4, customer => 0');
            $table->string('status')->default(0)->comment('approve => 1, deny => 2');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('fcmtoken')->nullable();
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
                    'phone'=>'1234567890',
                    'address'=>'A-510 Bmcoder',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>0,
                    'type' => 1,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',

                   
                ],
                [

                    'name' => 'vendor',
                    'email' => 'abc@vendor.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'D-mart odhav road',
                    'area'=>'Ahmedabad',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>1,
                    'state'=>'Gujarat',
                    'type' => 2,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



                ],
                [

                    'name' => 'Food-vendor',
                    'email' => 'abc@foodvendor.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'MS Food Ahmedabad',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>2,
                    'type' => 2,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



                ],
                [

                    'name' => 'Pharma-vendor',
                    'email' => 'abc@pharmavendor.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'zydus hospital',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>3,
                    'type' => 2,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



                ],
                [

                    'name' => 'delivery',
                    'email' => 'abc@delivery.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'A-510 Bmcoder',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>0,
                    'type' => 3,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



                ],
                [

                    'name' => 'rider',
                    'email' => 'abc@rider.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'A-510 Bmcoder',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>0,
                    'type' => 4,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



                ],
                [
                    'name' => 'customer',
                    'email' => 'abc@gmail.com',
                    'password' => Hash::make('12345678'),
                    'phone'=>'1234567890',
                    'address'=>'A-510 Bmcoder',
                    'area'=>'Ahmedabad',
                    'state'=>'Gujarat',
                    'country'=>'India',
                    'pincode'=>380052,
                    'store_type_id'=>0,
                    'type' => 0,
                    'profile'=>'',
                    'status'=>0,
                    'city'=>'ahmedabad',



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
