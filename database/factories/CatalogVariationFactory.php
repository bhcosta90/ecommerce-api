<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\CatalogVariation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class CatalogVariationFactory extends Factory
{
    protected $model = CatalogVariation::class;

    public function definition(): array
    {
        return [
            'variation'  => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'catalog_id' => Catalog::factory(),
        ];
    }
}
