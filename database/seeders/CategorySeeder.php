<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sector;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Sector::query()->each(function ($department) {
            Category::factory(5)->create([
                'sector_id' => $department->id,
            ]);
        });
    }
}
