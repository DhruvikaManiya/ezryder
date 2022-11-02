<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('user_id');
            $table->integer('store_type_id');
            $table->string('logo');
            $table->bigInteger('phone');
            $table->string('email')->nullable();
            $table->string('contact_person_name');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('area');
            $table->string('vat')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->integer('admin_by_verify')->default(0);

            $table->timestamps();
        });
        DB::table('stores')->insert(
            array(
                [
                    'name'=>'test food',
                    'user_id'=>1,
                    'store_type_id'=>1,
                     'logo'=>'/images/store/check_icon960191667056338.svg',
                     'phone'=>1,
                     'email'=>'r@r.com',
                     'contact_person_name'=>'rmcsdaehs',
                     'address'=>'address',
                     'city'=>'ciry',
                     'state'=>'sattes',
                     'country'=>'cpuntry',
                     'area'=>'acac',
                     'vat'=>1233655,
                     'lat'=>111,
                     'lon'=>111

                ],
                [
                    'name'=>'test food',
                    'user_id'=>1,
                    'store_type_id'=>2,
                     'logo'=>'/images/store/check_icon960191667056338.svg',
                     'phone'=>1,
                     'email'=>'r@r.com',
                     'contact_person_name'=>'ramesh',
                     'address'=>'address',
                     'city'=>'ciry',
                     'state'=>'sattes',
                     'country'=>'cpuntry',
                     'area'=>'acac',
                     'vat'=>1233655,
                     'lat'=>111,
                     'lon'=>111

                ],
                [
                    'name'=>'test food',
                    'user_id'=>1,
                    'store_type_id'=>3,
                     'logo'=>'/images/store/check_icon960191667056338.svg',
                     'phone'=>1,
                     'email'=>'r@r.com',
                     'contact_person_name'=>'ramesh',
                     'address'=>'address',
                     'city'=>'ciry',
                     'state'=>'sattes',
                     'country'=>'cpuntry',
                     'area'=>'acac',
                     'vat'=>1233655,
                     'lat'=>111,
                     'lon'=>111

                ],
                [
                    'name'=>'test 1',
                    'user_id'=>1,
                    'store_type_id'=>1,
                     'logo'=>'/images/store/check_icon960191667056338.svg',
                     'phone'=>1,
                     'email'=>'r@r.com',
                     'contact_person_name'=>'brijesh',
                     'address'=>'address',
                     'city'=>'ciry',
                     'state'=>'sattes',
                     'country'=>'cpuntry',
                     'area'=>'acac',
                     'vat'=>1233655,
                     'lat'=>111,
                     'lon'=>111

                ],
                [
                    'name'=>'test 2',
                    'user_id'=>1,
                    'store_type_id'=>1,
                     'logo'=>'/images/store/check_icon960191667056338.svg',
                     'phone'=>1,
                     'email'=>'r@r.com',
                     'contact_person_name'=>'jjj',
                     'address'=>'address',
                     'city'=>'ciry',
                     'state'=>'sattes',
                     'country'=>'cpuntry',
                     'area'=>'acac',
                     'vat'=>1233655,
                     'lat'=>111,
                     'lon'=>111

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
        Schema::dropIfExists('stores');
    }
}
