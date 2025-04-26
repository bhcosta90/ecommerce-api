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
            ($sectors = Sector::query())->each(function ($department) {
                Category::factory(rand(2, 4))->create([
                    'sector_id' => $department->id,
                ]);
            });

            Category::factory()->create([
                'id'        => '019673a6-c4d7-70a1-8031-c91075ae77d0',
                'sector_id' => $sectors->first()->id,
            ]);

            Category::factory()->create([
                'id'        => '019673a6-c4d7-70a1-8031-c91075ae77d1',
                'sector_id' => $sectors->first()->id,
            ]);

            Category::factory()->create([
                'id'        => '019673a6-c4d7-70a1-8031-c91075ae77d2',
                'sector_id' => $sectors->first()->id,
            ]);
        });
    }
}
