<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\CatalogCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class CatalogCategoryFactory extends Factory
{
    protected $model = CatalogCategory::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'catalog_id'  => Category::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
