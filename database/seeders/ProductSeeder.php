<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $category = Category::all()->pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            $price = $faker->numberBetween(100000, 1000000);

            $product = Product::create([
                'category_id' => $faker->randomElement($category),
                'name' => $faker->sentence(3),
                'price' => $price,
            ]);
        }
    }
}
