<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class SubCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            ($categories = Category::query())->each(function ($department) {
                SubCategory::factory(rand(2, 4))->create([
                    'category_id' => $department->id,
                ]);
            });

            SubCategory::factory()->create([
                'id'          => '019673a6-c4d7-70a1-8031-c91075ae77d0',
                'category_id' => $categories->first()->id,
            ]);

            SubCategory::factory()->create([
                'id'          => '019673a6-c4d7-70a1-8031-c91075ae77d1',
                'category_id' => $categories->first()->id,
            ]);

            SubCategory::factory()->create([
                'id'          => '019673a6-c4d7-70a1-8031-c91075ae77d2',
                'category_id' => $categories->first()->id,
            ]);
        });
    }
}
