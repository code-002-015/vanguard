<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=20; $i++){
            DB::table('products')
                ->insert([
                    'code' => 'PR000000'.$i,
                    'category_id' => $faker->numberBetween($min = 1, $max = 4),
                    'name' => 'Product '.$i,
                    'short_description' => '<p>This is short description</p>',
                    'description' => '<p>This is description</p>',
                    'price' => number_format($faker->numberBetween($min = 1, $max = 1000),4),
                    'currency' => 'PHP',
                    'size' => '',
                    'weight' => '',
                    'status' => 'PUBLISHED',
                    'uom' => 'PC',
                    'brand' => 'Brand '.$faker->numberBetween($min = 1, $max = 4),
                    'slug' => 'product-'.$i,
                    'is_featured' => '0',
                    'created_by' => 1,
                    'meta_title' => '',
                    'meta_description' => '',
                    'meta_keyword' => '',
                ]);
        }

    }
}
