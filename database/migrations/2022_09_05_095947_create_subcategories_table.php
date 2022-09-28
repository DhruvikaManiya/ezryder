<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->integer('category_id');
            $table->string('subcate_image')->nullable();

            $table->timestamps();
        });
        // add data
        $data = [
            [
                'name' => 'Banana',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/100001662544277.png',
                'category_id' => 1,
            ],
            [
                'name' => 'Berry',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/100001662544277.png',
                'category_id' => 1,
            ],
            [
                'name' => 'Apple',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/100001662544277.png',
                'category_id' => 1,
            ],
            [
                'name' => 'Kiwi',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/100001662544277.png',
                'category_id' => 1,
            ],
            [
                'name' => 'wheat Flour',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/flour.png',
                'category_id' => 2,
            ],
            [
                'name' => 'Corn Flour',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/flour.png',
                'category_id' => 2,
            ],
            [
                'name' => 'Semolina flour',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/flour.png',
                'category_id' => 2,
            ],
            [
                'name' => 'Brown rice flour',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/flour.png',
                'category_id' => 2,
            ],
            [
                'name' => 'Sunflower oil',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/olive-oil.png',
                'category_id' => 3,
            ],
            [
                'name' => 'Soyabean oil',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/olive-oil.png',
                'category_id' => 3,
            ],
            [
                'name' => 'Cotton oil',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/olive-oil.png',
                'category_id' => 3,
            ],
            [
                'name' => 'Olive oil',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/olive-oil.png',
                'category_id' => 3,
            ],
            // wheat
            [
                'name' => 'Tometo ',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/ketchup.png',
                'category_id' => 4,
            ],
            [
                'name' => 'Soya',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/ketchup.png',
                'category_id' => 4,
            ],
            [
                'name' => 'Spicy',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/ketchup.png',
                'category_id' => 4,
            ],
            [
                'name' => 'mayonnaise',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/ketchup.png',
                'category_id' => 4,
            ],
            [
                'name' => 'Garlic bread',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/pizza.svg',
                'category_id' => 5,
            ],
            [
                'name' => 'margirita pizza',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/pizza.svg',
                'category_id' => 5,
            ],
            [
                'name' => 'Queen cheese pizza',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/pizza.svg',
                'category_id' => 5,
            ],
            [
                'name' => 'aloo tikki burger',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/burger.svg',
                'category_id' => 6,
            ],
            [
                'name' => 'mayo mexican burger',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/burger.svg',
                'category_id' => 6,
            ],
            [
                'name' => 'Cheese burger',
                'description' => 'Good for health',
                'subcate_image' => '/images/subcategory/burger.svg',
                'category_id' => 6,
            ],
            [
                'name' => 'Black foreast',
                'description' => 'Good for health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 7,
            ], [
                'name' => 'Puff pastry',
                'description' => 'Good for health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 7,
            ],
            // Medicine
            [
                'name' => 'Anaglesic',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 8,
            ],
            [
                'name' => 'Antihistamine',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 8,
            ],
            [
                'name' => 'Antacid',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 8,
            ],
            // Vitamins
            [
                'name' => 'Vitamins C',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 9,
            ],
            [
                'name' => 'Vitamins B',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 9,
            ],
            [
                'name' => 'Vitamins D',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 9,
            ],
            // Ayurveda
            [
                'name' => 'Abhukta',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 10,
            ],
            [
                'name' => 'Prangbhutka',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 10,
            ],
            [
                'name' => 'Kashaya',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 10,
            ],
             // Homeopathy
             [
                'name' => 'Apis mellifica',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 11,
            ],
            [
                'name' => 'Badiaga',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 11,
            ],
            [
                'name' => 'vipera',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 11,
            ],
             // Surgeries
            [
                'name' => 'Open Cholecystecttomy',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 12,
            ],
            [
                'name' => 'Nephrectomy',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 12,
            ],
            [
                'name' => 'Hysterectomy',
                'description' => 'help to recover your health',
                'subcate_image' => '/images/category/cake.png',
                'category_id' => 12,
            ],
    
           
        ];
        DB::table('subcategories')->insert($data);
    }

    /**
     * Reverse the migrations.  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
