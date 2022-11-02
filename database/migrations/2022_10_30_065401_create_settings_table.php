<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_per_km_rate');
            $table->integer('gov_tax_in_percent');
            $table->integer('packaging_charges');
            $table->timestamps();
        });
        $data = [
            [
                'delivery_per_km_rate' => 10,
                'gov_tax_in_percent' => 2,
                'packaging_charges' => 20,
                
            ],
        ];
        DB::table('settings')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
