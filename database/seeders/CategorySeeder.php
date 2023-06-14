<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Fancy Product',
            'Sale Item',
            'Popular Item',
            'Special Item',
        ];

        foreach ($data as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
