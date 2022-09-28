<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->timestamps();
        });
        $data = [
            [
                'name' => 'pepsi',
                'image' => '/images/brand/pepsi.svg',
                
            ],
            [
                'name' => 'ritz',
                'image' => '/images/brand/ritz.svg',
                
            ],
            [
                'name' => 'layzs',
                'image' => '/images/brand/layzs.svg',
                
            ],
            [
                'name' => 'nike',
                'image' => '/images/brand/nike.svg',
                
            ],
            [
                'name' => 'nestle',
                'image' => '/images/brand/nestle.svg',
                
            ],
            [
                'name' => 'Rectangle 18',
                'image' => '/images/brand/Rectangle 18.svg',
                
            ],
        ];
        DB::table('brands')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
