<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class SubCategoryFactory extends Factory
{
    protected $model = SubCategory::class;

    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::factory(),
        ];
    }
}
