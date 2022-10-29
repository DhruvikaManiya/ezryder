<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVehicleChargeDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\VehicleMake::truncate();

        $data = array("Audi", "Bentley", "BMW", "Chevrolet", "Fiat", "Ford", "Honda", "Hyundai", "Jaguar", "Land Rover", "Mahindra", "Maruti Suzuki", "Mercedes Benz", "Mitsubishi", "Nissan", "Porche", "Range Rover", "Renault", "Rolls-Royce", "Skoda", "Tata Motors", "Toyota", "Volkswagen", "Volvo");

        foreach ($data as $item){

            $make['vehicle_type_id'] = 1;

            $make['name'] = $item;

            \App\VehicleMake::create($make);
        }

        foreach ($data as $item){

            $make['vehicle_type_id'] = 2;

            $make['name'] = $item;

            \App\VehicleMake::create($make);
        }

        foreach ($data as $item){

            $make['vehicle_type_id'] = 3;

            $make['name'] = $item;

            \App\VehicleMake::create($make);
        }

        \App\VehicleModel::truncate();

        foreach ($data as $item){

            $model['make_id'] = 1;

            $model['name'] = $item;

            \App\VehicleModel::create($model);
        }

        foreach ($data as $item){

            $model['make_id'] = 2;

            $model['name'] = $item;

            \App\VehicleModel::create($model);
        }

        foreach ($data as $item){

            $model['make_id'] = 3;

            $model['name'] = $item;

            \App\VehicleModel::create($model);
        }

        \App\VehicleCharge::truncate();


        $charge['type_id'] = 1;

        $charge['make_id'] = 2;

        $charge['model_id'] = 28;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 10;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 2;

        $charge['make_id'] = 2;

        $charge['model_id'] = 28;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 10;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 3;

        $charge['make_id'] = 1;

        $charge['model_id'] = 29;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 10;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 1;

        $charge['make_id'] = 3;

        $charge['model_id'] = 29;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 10;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 2;

        $charge['make_id'] = 3;

        $charge['model_id'] = 30;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 12;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 2;

        $charge['make_id'] = 2;

        $charge['model_id'] = 31;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 10;

        $charge['customer_charge'] = 12;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 2;

        $charge['make_id'] = 2;

        $charge['model_id'] = 32;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 12;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);

        $charge['type_id'] = 3;

        $charge['make_id'] = 2;

        $charge['model_id'] = 33;

        $charge['distance'] = 1;

        $charge['rider_charge'] = 8;

        $charge['customer_charge'] = 12;

        $charge['number'] = 10;

        \App\VehicleCharge::create($charge);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
