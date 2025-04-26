<?php

declare(strict_types = 1);

namespace Database\Factories;

use App\Models\Catalog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

final class CatalogFactory extends Factory
{
    protected $model = Catalog::class;

    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
