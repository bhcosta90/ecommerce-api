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
                SubCategory::factory(5)->create([
                    'category_id' => $department->id,
                ]);
            });

            SubCategory::factory()->create([
                'id'          => '019673a6-cb1f-71bf-ac8a-6764e53234a0',
                'category_id' => $categories->first()->id,
            ]);
        });
    }
}
