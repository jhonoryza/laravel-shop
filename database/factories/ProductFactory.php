<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'sku' => $this->faker->text(rand(128, 255)),
            'slug' => $this->faker->slug(6),
            'name' => $this->faker->text(rand(128, 255)),
            'description' => $this->faker->paragraph(5),
            'price' => $this->faker->numberBetween(0, 99999),
            'disc_price' => $this->faker->numberBetween(0, 99999),
            'stock' => $this->faker->numberBetween(0, 99999),
            'weight' => $this->faker->numberBetween(0, 99999),
            'sold_count' => $this->faker->numberBetween(0, 99999),
            'published_at' => Carbon::now()->subDays(rand(1, 60))->addHours(rand(1, 12))->addMinutes(rand(1, 30))->addSeconds(rand(1, 30)),
        ];
    }
}
