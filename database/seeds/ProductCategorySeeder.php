<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $categories = [
            [
                'parent_id' => '0',
                'name' => 'Category 1',
                'slug' => 'category-1',
                'description' => '',
                'status' => 'PUBLISHED',
                'created_by' => 1
            ],
            [
                'parent_id' => '0',
                'name' => 'Category 2',
                'slug' => 'category-2',
                'description' => '',
                'status' => 'PUBLISHED',
                'created_by' => 1
            ],
            [
                'parent_id' => '0',
                'name' => 'Category 3',
                'slug' => 'category-3',
                'description' => '',
                'status' => 'PUBLISHED',
                'created_by' => 1
            ],
            [
                'parent_id' => '0',
                'name' => 'Category 4',
                'slug' => 'category-4',
                'description' => '',
                'status' => 'PUBLISHED',
                'created_by' => 1
            ]
        ];

        DB::table('product_categories')->insert($categories);
    }
}
