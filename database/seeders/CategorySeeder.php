<?php

declare(strict_types = 1);

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            Sector::query()->each(function ($department) {
                Category::factory(5)->create([
                    'sector_id' => $department->id,
                ]);
            });
        });
    }
}
