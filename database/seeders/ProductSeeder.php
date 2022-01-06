<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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
        $categoryIds = Category::pluck('id')->toArray();

        foreach ($categoryIds as $categoryId) {
            Product::factory(5)->create([
                'category_id' => $categoryId,
            ]);
        }
    }
}
